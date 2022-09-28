<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categories;
use App\Models\Colors;
use App\Models\Products;
use App\Models\User;
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

        Products::factory(30)->create();
        Categories::factory(6)->create();
        Colors::factory(4)->create();

        User::factory()->create([
            'email' => 'florian@gmail.com',
            'name' => 'Florian',
            'is_admin' => true,
        ]);

        

        Categories::all()->each(function ($category) {
            $product = Products::all();
            $category->products()->saveMany($product->random(mt_rand(1, 6)));
        });
        

        $colors = Colors::all();

        Products::all()->each(function ($product) use ($colors) {
            $product->colors()->attach(
                $colors->random(rand(1, 4))->pluck('id')->toArray()
            );
        });

        
        
        

        

        

        

        
    }
}
