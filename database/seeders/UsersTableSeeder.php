<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'      => 'Felipe Soares',
            'email'     => 'felipe@gmail.com',
            'cpf'     => '43677183871',
            'phone'     => '16992694025',
            'date_birth'     => '1999-07-02',
            'gender'     => 'mas',
            'password'  => bcrypt('123456'),
            'image'  => null,
            'hash'  => null,
            'qr_code'  => null,
            'status'  => 1,
            'accept_lgpd'  => 1,
            'administrator' => 1
        ]);


    }
}

