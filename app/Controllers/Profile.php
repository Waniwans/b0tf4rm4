<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Profile extends Controller {
    public function index() {
        $data['user'] = [
            'name' => 'Aliando Syarif',
            'avatar' => 'default_avatar.png'
        ];

        $data['banks'] = [
            ['name' => 'Kuda', 'logo' => 'kuda_logo.png'],
            ['name' => 'Access', 'logo' => 'access_logo.png'],
            ['name' => 'Zenith', 'logo' => 'zenith_logo.png'],
            ['name' => 'Sterling', 'logo' => 'sterling_logo.png']
        ];

        return view('profile', $data);
    }

    public function update() {
        $request = service('request');
        $newName = $request->getPost('name');
        
        if (!$newName) {
            return redirect()->back()->with('error', 'Nama tidak boleh kosong!');
        }
        
        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
?>