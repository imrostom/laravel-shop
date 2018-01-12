<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->freeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->unique()->word,
        'category_description' => $faker->text(100),
        'publication_status' => $faker->numberBetween(0,1),
    ];
});

$factory->define(App\Manufacture::class, function (Faker $faker) {
    return [
        'manufacture_name' => $faker->unique()->word,
        'manufacture_description' => $faker->text(100),
        'publication_status' => $faker->numberBetween(0,1),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    $filepath = storage_path('app/public/images');
    if(!File::exists($filepath)){
        File::makeDirectory($filepath);  //follow the declaration to see the complete signature
    }
    
    return [
        'post_title' => $faker->unique()->sentence(),
        'post_description' => $faker->text(1500),
        'post_image' => $faker->image($filepath,700,600,'',false),
        'post_category' => $faker->numberBetween(1,10),
        'post_user' => 1,
        'publication_status' => $faker->numberBetween(0,1),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    $filepath = storage_path('app/public/images');
    if(!File::exists($filepath)){
        File::makeDirectory($filepath);  //follow the declaration to see the complete signature
    }
    
    return [
        'product_title' => $faker->unique()->sentence(),
        'product_description' => $faker->text(1500),
        'product_image' => $faker->image($filepath,700,600,'',false),
        'product_manufacture' => $faker->numberBetween(1,10),
        'product_key' => $faker->numberBetween(100,1000),
        'product_price' => $faker->numberBetween(100,1000),
        'product_quantity' => $faker->numberBetween(10,200),
        'product_aviality' => $faker->numberBetween(100,1000),
        'product_condition' => $faker->numberBetween(0,1),
        'product_view' => $faker->numberBetween(10,100),
        'product_user' => 1,
        'publication_status' => $faker->numberBetween(0,1),
    ];
});
