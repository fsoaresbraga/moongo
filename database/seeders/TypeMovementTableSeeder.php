<?php

namespace Database\Seeders;

use App\Models\TypeMovement;
use Illuminate\Database\Seeder;

class TypeMovementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeMovement::create([
            'name'      => 'Entrada',
            'status'     => '1'
        ]);

        TypeMovement::create([
            'name'      => 'Saída',
            'status'     => '1'
        ]);
    }
}
