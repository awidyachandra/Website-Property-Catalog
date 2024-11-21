<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Property::create([
            'nama_aset' => 'Skyper Pool Apartment',
            'jenis_aset' => 'Apartment',
            'deskripsi' => 'Sebuah apartemen mewah dengan pemandangan kolam renang.',
            'lokasi' => '1020 Bloomingdale Ave',
            'image_url' => '',
            'kondisi' => 'For Rent',
        ]);

        // Tambahkan data lain sesuai kebutuhan
    }
}
