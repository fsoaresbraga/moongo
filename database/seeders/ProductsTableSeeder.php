<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create([
            'title'      => 'KIT KAT 45G ',
            'price'     => 3.50,
            'rating'  => 102,
            'image' => 'kitkat.png'
        ]);

        Product::create([
            'title'      => 'LACTA BIS XTRA 45G',
            'price'     => 3.50,
            'rating'  => 95,
            'image' => 'bis.png'
        ]);

        Product::create([
            'title'      => 'BIBS NEUGEBAUER',
            'price'     => 3.50,
            'rating'  => 80,
            'image' => 'bibs.png'
        ]);

        Product::create([
            'title'      => 'TALENTO  25G',
            'price'     => 3.50,
            'rating'  => 35,
            'image' => 'talento.png'
        ]);

        Product::create([
            'title'      => 'DROPS MENTOS',
            'price'     => 3.00,
            'rating'  => 15,
            'image' => 'mentos.png'
        ]);

        Product::create([
            'title'      => 'TRIDENT  8G',
            'price'     => 3.00,
            'rating'  => 55,
            'image' => 'trident.png'
        ]);

        Product::create([
            'title'      => 'HALLS 28G',
            'price'     => 3.00,
            'rating'  => 73,
            'image' => 'halls.png'
        ]);

        Product::create([
            'title'      => 'MMS TUBO 30G',
            'price'     => 3.00,
            'rating'  => 81,
            'image' => 'mms.png'
        ]);

        Product::create([
            'title'      => 'SNICKERS 45G',
            'price'     => 2.50,
            'rating'  => 10,
            'image' => 'snickers.png'
        ]);

        Product::create([
            'title'      => 'AMENDOIM DORI',
            'price'     => 2.50,
            'rating'  => 11,
            'image' => 'amendoin.png'
        ]);

        Product::create([
            'title'      => 'BARRA DE CEREAL TRIO 20G',
            'price'     => 2.50,
            'rating'  => 6,
            'image' => 'barra-de-cereal.png'
        ]);
    }
}
