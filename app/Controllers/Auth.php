<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
    }

    // Tampilkan form login
    public function login()
    {
        return view('auth/login');
    }

    
    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Set session
                $this->session->set([
                    'isLoggedIn' => true,
                    'user_id'  => $user['id'],
                    'username' => $user['username'],
                    'role'     => $user['role'],
                    'logged_in'=> true
                ]);

                // Arahkan sesuai role
                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/home');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah')->withInput();
            }
        } else {
            return redirect()->back()->with('error', 'User tidak ditemukan')->withInput();
        }
    }

    // Tampilkan form registrasi admin
    public function registerAdmin()
    {
        return view('auth/register_admin');
    }

    // Proses registrasi admin
    public function processRegisterAdmin()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode(', ', $validation->getErrors()));
        }

        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'admin'
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi admin berhasil, silakan login.');
    }

    // Logout
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
