<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Barang::insert([
            [
                'nama_brg' => 'Kopi Arabika 1KG',
                'stok' => '50',
                'hrg_jsat' => '150000',
                'hrg_bsat' => '125000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Kopi Robusta 1KG',
                'stok' => '50',
                'hrg_jsat' => '150000',
                'hrg_bsat' => '125000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Gula 1KG',
                'stok' => '50',
                'hrg_jsat' => '20000',
                'hrg_bsat' => '14000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Milo 1Bks',
                'stok' => '50',
                'hrg_jsat' => '80000',
                'hrg_bsat' => '50000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Margarin 1Bks',
                'stok' => '50',
                'hrg_jsat' => '15000',
                'hrg_bsat' => '12000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Telor 1KG',
                'stok' => '50',
                'hrg_jsat' => '20000',
                'hrg_bsat' => '18000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Indomie Goreng 1Dus',
                'stok' => '50',
                'hrg_jsat' => '110000',
                'hrg_bsat' => '100000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Indomie Kuah 1Dus',
                'stok' => '50',
                'hrg_jsat' => '110000',
                'hrg_bsat' => '100000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Mie Sedap Kuah 1Dus',
                'stok' => '50',
                'hrg_jsat' => '120000',
                'hrg_bsat' => '110000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_brg' => 'Mie Sedap Goreng 1Dus',
                'stok' => '50',
                'hrg_jsat' => '120000',
                'hrg_bsat' => '110000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
