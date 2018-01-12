<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminTableSeeder::class);
         factory(App\User::class,10)->create();
         factory(App\Category::class,10)->create();
         factory(App\Manufacture::class,10)->create();
         factory(App\Post::class,100)->create();
         factory(App\Product::class,100)->create();
    }
}
