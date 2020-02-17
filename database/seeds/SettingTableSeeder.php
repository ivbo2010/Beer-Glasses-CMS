<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        DB::table('settings')->truncate();
        $settinges =Setting::create([
            'site_name' => 'Beer Site CMS',
            'site_logo' => 'logo.png',
            'site_favicon' => 'favicon.ico',
            'email' => 'beercms@local.com',
            'phone' => '00506754656',
            'facebook' => 'https://www.facebook.com/',
            'twitter' => 'https://www.twitter.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'vimeo' => 'https://www.vimeo.com/',
            'youtube' => 'https://www.youtube.com/'
        ]);
    }
}
