<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(PubCategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PubsTableSeeder::class);
        $this->call(BeersTableSeeder::class);
		$this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);

    }
}
