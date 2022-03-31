<?php

namespace Database\Seeders;
use App\Models\Fasilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasilitas = [
            ##type kamar 3
            [
               'nama_fasilitas' => '',
               'harga_fasilitas' => '0',
            ],
            [
               'nama_fasilitas' => 'Extra Bed',
               'harga_fasilitas' => '500000',
            ],
            [
               'nama_fasilitas' => 'Pack HoneyMoon',
               'harga_fasilitas' => '700000',
            ],

        ];

        foreach ($fasilitas as $key => $value) {
            Fasilitas::create($value);
        }
    }
}
