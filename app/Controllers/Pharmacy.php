<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Pharmacy extends Controller {
    public function index() {
        $data['location'] = [
            'name' => 'Sarboah',
            'address' => 'Jl. Sinar Jaya No. 123, Lewisadeng, Kota Bogor Indonesia 55241'
        ];

        $data['pharmacies'] = [
            [
                'name' => 'Apotek K-24 Santuy',
                'address' => 'Jl. Sinar Jaya No. 123 Lewisadeng, Kota Bogor',
                'distance' => '0.2 km',
                'nearest' => true
            ],
            [
                'name' => 'Apotek K-24 Santuy',
                'address' => 'Jl. Batok Indah No. 153 Lewisadeng, Kota Bogor',
                'distance' => '0.2 km',
                'nearest' => false
            ],
            [
                'name' => 'Apotek K-24 Santuy',
                'address' => 'Jl. Batok Indah No. 153 Lewisadeng, Kota Bogor',
                'distance' => '0.2 km',
                'nearest' => false
            ]
        ];

        return view('pharmacy_select', $data);
    }

    public function selectPharmacy()
    {
        $selectedPharmacy = $this->request->getPost('pharmacy');
        
        if ($selectedPharmacy === null) {
            return redirect()->back()->with('error', 'Silakan pilih apotek terlebih dahulu!');
        }

        
        session()->set('selected_pharmacy', $selectedPharmacy);

        return redirect()->to('/confirmation')->with('success', 'Apotek berhasil dipilih!');
    }

    public function confirmation()
    {
        $selectedPharmacy = session()->get('selected_pharmacy');

        if (!$selectedPharmacy) {
            return redirect()->to('/')->with('error', 'Tidak ada apotek yang dipilih.');
        }

        return view('confirmation', ['pharmacy' => $selectedPharmacy]);
    }
}
