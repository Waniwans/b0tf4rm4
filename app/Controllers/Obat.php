<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Obat extends BaseController
{
    public function index()
    {
        $data = [
            'promotions' => $this->getPromotions(),
        ];

        return view('obat', $data);
    }

    private function getPromotions()
    {
        return [
            ['name' => 'MYLANTA CAIR 50ML', 'image' => 'mylanta.png'],
            ['name' => 'PANADOL BIRU TABLET 1 STRIP', 'image' => 'panadol.png'],
            ['name' => 'ENERVON C TABLET (Isi 30 Tablet)', 'image' => 'enervon.png'],
            ['name' => 'BEBELAC 3 MADU 400G', 'image' => 'bebelac.png'],
            ['name' => 'DIABETONE CAPSULE', 'image' => 'diabetone.png'],
        ];
    }
}
