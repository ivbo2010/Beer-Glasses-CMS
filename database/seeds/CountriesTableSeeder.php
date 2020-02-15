<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Country::truncate();
        DB::table('countries')->truncate();
        $countries =Country::create([
            'name' => 'Bulgaria'
        ]);
    }
}
