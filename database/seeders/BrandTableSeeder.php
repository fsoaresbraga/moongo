<?php

namespace Database\Seeders;

use App\Models\ProductBrand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        ProductBrand::create([
            'name'      => 'Nestlé',
            'status'     => '1'
            ]);
            ProductBrand::create([
            'name'      => 'Coca-Cola',
            'status'     => '1'
            ]);
            ProductBrand::create([
            'name'      => 'Mars',
            'status'     => '1'
            ]);
            ProductBrand::create([
            'name'      => "Kellogg's",
            'status'     => '1'
            ]);
            ProductBrand::create([
            'name'      => 'Pepsico',
            'status'     => '1'
            ]);
            ProductBrand::create([
            'name'      => 'Halls ',
            'status'     => '1'
            ]);
            ProductBrand::create([
            'name'      => 'Trident',
            'status'     => '1'
            ]);
        
    }
}

