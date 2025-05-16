<?php

namespace App\Controllers;

class Agenda extends BaseController
{
    private $data = [
        [
            'judul' => 'Pelayanan Kesehatan Pemilu 2024',
            'slug' => 'pelayanan-kesehatan-pemilu-2024',
            'isi' => 'Dukungan pelayanan kesehatan disiapkan di seluruh TPS.'
        ],
        [
            'judul' => 'Gerakan Masyarakat Hidup Sehat',
            'slug' => 'germas-kesehatan',
            'isi' => 'Germas akan diluncurkan serentak di 34 provinsi pada bulan depan.'
        ]
    ];

    public function detail($slug)
    {
        $agenda = null;

        foreach ($this->data as $item) {
            if ($item['slug'] === $slug) {
                $agenda = $item;
                break;
            }
        }

        if (!$agenda) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Agenda tidak ditemukan.");
        }

        return view('agenda_detail', ['agenda' => $agenda]);
    }
}
