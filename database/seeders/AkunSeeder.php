<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        [
            'name' => 'Riswan Sulia Tritama',
            'email' => 'rstritama@gmail.com',
            'level' => 'pegawai',
            'password' => bcrypt('Tritama9719')
        ],
        [
            'name' => 'Nathaanna Ilenne Haryanto',
            'email' => 'inathaanna@gmail.com',
            'level' => 'manager',
            'password' => bcrypt('chanyeol08')
        ],
        [
            'name' => 'Lleone',
            'email' => 'riswanst@gmail.com',
            'level' => 'manager',
            'password' => bcrypt('Tritama9719')
        ]
    ];

    foreach ($user as $key => $value) {
        User::create($value);
    }
    }
}
