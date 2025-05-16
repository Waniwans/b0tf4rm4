<?php

namespace App\Controllers;

class Pengumuman extends BaseController
{
    private $data = [
        [
            'judul' => 'Pemeriksaan Kesehatan Gratis',
            'slug' => 'pemeriksaan-kesehatan-gratis',
            'isi' => 'Petunjuk teknis pemeriksaan kesehatan gratis dalam rangka HUT Kemenkes.'
        ],
        [
            'judul' => 'Informasi Vaksinasi Nasional',
            'slug' => 'informasi-vaksinasi-nasional',
            'isi' => 'Vaksinasi nasional dilakukan serentak mulai 1 Juni 2025.'
        ]
    ];

    public function detail($slug)
    {
        $pengumuman = null;

        foreach ($this->data as $item) {
            if ($item['slug'] === $slug) {
                $pengumuman = $item;
                break;
            }
        }

        if (!$pengumuman) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pengumuman tidak ditemukan.");
        }

        return view('pengumuman_detail', ['pengumuman' => $pengumuman]);
    }
}
