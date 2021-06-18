<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pesanan::insert([
            [
                'id' => '1',
                'nama_cus' => 'Nathaanna',
                'id_brg' => '1',
                'hrg_jsat' => '150000',
                'jlh_item' => '30',
                'total_hrg' => '4500000',
                'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
            ]
        ]);
    }
}
