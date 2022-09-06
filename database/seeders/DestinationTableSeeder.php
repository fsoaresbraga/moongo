<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destination::create([
            'name'      => 'Carro',
            'status'     => '1'
        ]);

        Destination::create([
            'name'      => 'Estoque',
            'status'     => '1'
        ]);

        Destination::create([
            'name'      => 'Perda',
            'status'     => '1'
        ]);

        Destination::create([
            'name'      => 'Venda',
            'status'     => '1'
        ]);
       
    }
}
