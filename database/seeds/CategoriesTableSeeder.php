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

        $categorie =Category::create([
            'name' => 'Bernard',
            'image' => '883000768.jpg',
        ]);

    }
}
