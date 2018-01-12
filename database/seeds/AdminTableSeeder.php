<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_admin')->insert([
            'admin_name' => 'admin',
            'admin_email' => 'admin@gmail.com',
            'admin_password' => md5('admin'),
        ]);
        
        DB::table('tbl_option')->insert([
            'header_phone' => '01793589850',
            'header_email' => 'admin@gmail.com',
            'facebook_url' => 'http://www.fcebook.com',
            'twitter_url' => 'http://www.twitter.com',
            'linkin_url' => 'http://www.linkin.com',
            'google_url' => 'http://www.google.com',
            'theme_logo' => 'nai',
            'sidebar_add_img' => 'nai',
            'sidebar_add_link' => '#',
            'about_us_text' => 'Welcome to our Shop',
            'footer_contact_address' => 'dhaka,Bangladesh',
            'copyright_by' => '&copy;Right By Imrostom',
            'developed_by' => '&copy;Right By Rostom Ali',
            'map_latitude' => '55',
            'map_longitute' => 'yyy',
            'contact_page_address' => 'Dhaka,Bangladesh',
        ]);
    }
}
