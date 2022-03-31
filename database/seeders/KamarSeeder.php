<?php

namespace Database\Seeders;
use App\Models\Kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kamar = [
            ##type kamar 3
            [
               'nama_kamar' => 'Lavender',
               'type_kamar' => '3',
               'stok' => '10',
               'harga_kamar' => '350000',

            ],
            [
               'nama_kamar' => 'Kamboja',
               'type_kamar' => '2',
               'stok' => '10',
               'harga_kamar' => '550000',

            ],
            [
               'nama_kamar' => 'Juliet',
               'type_kamar' => '1',
               'stok' => '10',
               'harga_kamar' => '1200000',

            ],
        ];

        foreach ($kamar as $key => $value) {
            Kamar::create($value);
        }
    }
}
