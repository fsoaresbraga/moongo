<?php

namespace Database\Seeders;

use App\Models\Origin;
use Illuminate\Database\Seeder;

class OriginTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Origin::create([
            'name'      => 'Estoque',
            'status'     => '1'
        ]);

        Origin::create([
            'name'      => 'Carro',
            'status'     => '1'
        ]);

        Origin::create([
            'name'      => 'Perda',
            'status'     => '1'
        ]);

        Origin::create([
            'name'      => 'Compra',
            'status'     => '1'
        ]);

        Origin::create([
            'name'      => 'Venda',
            'status'     => '1'
        ]);
    }
}
