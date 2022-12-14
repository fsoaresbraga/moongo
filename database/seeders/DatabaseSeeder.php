<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BrandTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\CategoryTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        $this->call([
            UsersTableSeeder::class,
            ProductsTableSeeder::class,
        ]);*/

        $this->call([
            BrandTableSeeder::class,
            CategoryTableSeeder::class,
            UsersTableSeeder::class,
            TypeMovementTableSeeder::class,
            OriginTableSeeder::class,
            DestinationTableSeeder::class

        ]);
    }
}
