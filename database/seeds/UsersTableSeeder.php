<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole= Role::where('name','admin')->first();
        $authorRole= Role::where('name','author')->first();
        $userRole= Role::where('name','user')->first();

        $admin =User::create([
            'name'=>'Admin User',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('11111111')
        ]);

        $author =User::create([
            'name'=>'Autor User',
            'email'=>'admin1@admin.com',
            'password'=>Hash::make('11111111')
        ]);

        $user =User::create([
            'name'=>'Generic User',
            'email'=>'admin2@admin.com',
            'password'=>Hash::make('11111111')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
