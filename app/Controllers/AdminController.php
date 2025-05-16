<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/');
        }

        return view('admin/dashboard');
    }
}
