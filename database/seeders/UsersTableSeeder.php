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
            'name'      => 'Humberto M',
            'email'     => 'humberto@gmail.com',
            'ranking'     => '73',
            'password'  => bcrypt('123456'),
            'hash'  => uniqid(),
            'QRCode'  => uniqid().'.png',
            'city' => 'São Paulo',
            'lgpd' => '1'
        ]);

        User::create([
            'name'      => 'Luiz C',
             'email'     => 'luiz@gmail.com',
            'ranking'     => '51',
            'password'  => bcrypt('123456'),
            'hash'  => uniqid(),
            'QRCode'  => uniqid().'.png',
            'city' => 'São Paulo',
            'lgpd' => '1'
        ]);

        User::create([
            'name'      => 'Heber B',
             'email'     => 'heber@gmail.com',
            'ranking'     => '35',
            'password'  => bcrypt('123456'),
            'hash'  => uniqid(),
            'QRCode'  => uniqid().'.png',
            'city' => 'Ribeirão preto',
            'lgpd' => '1'
        ]);

         User::create([
            'name'      => 'João B',
             'email'     => 'joao@gmail.com',
            'ranking'     => '32',
            'password'  => bcrypt('123456'),
            'hash'  => uniqid(),
            'QRCode'  => uniqid().'.png',
            'city' => 'São Paulo',
            'lgpd' => '1'
        ]);

         User::create([
            'name'      => 'Reinaldo F',
             'email'     => 'reinaldo@gmail.com',
            'ranking'     => '25',
            'password'  => bcrypt('123456'),
            'hash'  => uniqid(),
            'QRCode'  => uniqid().'.png',
            'city' => 'São Paulo',
            'lgpd' => '1'
        ]);

                User::create([
            'name'      => 'Carla U',
             'email'     => 'carla@gmail.com',
            'ranking'     => '15',
            'password'  => bcrypt('123456'),
            'hash'  => uniqid(),
            'QRCode'  => uniqid().'.png',
            'city' => 'Ribeirão preto',
            'lgpd' => '1'
        ]);
    }
}
