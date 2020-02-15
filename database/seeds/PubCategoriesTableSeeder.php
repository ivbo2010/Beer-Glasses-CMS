<?php

use Illuminate\Database\Seeder;
use App\PubCategory;

class PubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        PubCategory::truncate();
        DB::table('pub_categories')->truncate();
        $pub_categories =PubCategory::create([
            'name' => 'pub',
            'image' => '1756438380.jpg',
        ]);
    }
}
