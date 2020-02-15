<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::truncate();
        DB::table('categories')->truncate();
        $categories =Category::create([
            'name' => 'Amstel',
            'image' => '1489614712.jpeg',
        ]);

    }
}
