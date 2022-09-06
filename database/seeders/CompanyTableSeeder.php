<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name'      => 'Moongo ',
            'code'      => 'Moongo ',
            'status'     => '1'
        ]);
    }
}
