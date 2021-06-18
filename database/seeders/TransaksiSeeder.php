<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Transaksi::insert([
            [
                'id_brg' => '1',
                'modal' => '6250000',
                'pemasukkan' => '4500000',
                'bulan' => '2021-06-18',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
