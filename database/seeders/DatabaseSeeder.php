<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AkunSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(PesananSeeder::class);
        $this->call(TransaksiSeeder::class);
    }

    //php artisan db:seed
    //php artisan db:seed --class=UsersTableSeeder
    //php artisan migrate:refresh --seed
}
