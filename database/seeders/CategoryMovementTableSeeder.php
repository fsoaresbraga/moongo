<?php

namespace Database\Seeders;

use App\Models\CategoryMovement;
use Illuminate\Database\Seeder;

class CategoryMovementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryMovement::create([
            'name'      => 'Carteira',
            'status'     => '1'
        ]);

        CategoryMovement::create([
            'name'      => 'Estoque',
            'status'     => '1'
        ]);

        CategoryMovement::create([
            'name'      => 'Bonificação',
            'status'     => '1'
        ]);

        CategoryMovement::create([
            'name'      => 'Perda',
            'status'     => '1'
        ]);
    }
}
