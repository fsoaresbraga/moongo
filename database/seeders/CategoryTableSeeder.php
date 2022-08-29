<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        ProductCategory::create([
            'name'      => 'Bebidas',
            'status'     => '1'
        ]);

        ProductCategory::create([
            'name'      => 'Bomboniere',
            'status'     => '1'
        
        ]);
    }
}
