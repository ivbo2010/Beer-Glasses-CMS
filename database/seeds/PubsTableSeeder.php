<?php

use Illuminate\Database\Seeder;
use App\Pub;

class PubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Pub::truncate();
        DB::table('pubs')->truncate();
        $pubs =Pub::create([
            'name' => 'Five Corners',
            'description' => 'Five Corners description',
            'category_id' => '1',
            'status'=>'1',
            'image' => '1650911607.jpg',
        ]);
    }
}
