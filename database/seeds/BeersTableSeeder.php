<?php

use Illuminate\Database\Seeder;
use App\Beer;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beer::truncate();
        DB::table('beers')->truncate();
        $beers =Beer::create(
            [
            'name' => 'Amstel',
            'description' => 'Amstel description',
            'qty' => '0.500l',
            'category_id' => '1',
            'country_id' => '1',
            'tag_id' => '1',
            'status'=>'1',
            'image' => 'amstel.jpg',
        ]);
        $beers =Beer::create([
            'name' => 'Bernard',
            'description' => 'Bernard description',
            'qty' => '0.300l',
            'category_id' => '2',
            'country_id' => '1',
            'tag_id' => '1',
            'status'=>'1',
            'image' => 'bernard300.jpg',
        ]);
        $beers =Beer::create([
            'name' => 'Bernard',
            'description' => 'Bernard description',
            'qty' => '0.500l',
            'category_id' => '2',
            'country_id' => '1',
            'tag_id' => '1',
            'status'=>'1',
            'image' => 'bernard500.jpg',
        ]);
    }
}
