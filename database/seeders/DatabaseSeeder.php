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
        $white = Colors::factory()->create(['name' => '#FFFFFF']);
        $black = Colors::factory()->create(['name' => '#000000']);

        $category = Categories::factory(6)->create();

        User::factory()->create([
            'email' => 'florian@gmail.com',
            'name' => 'Florian',
            'is_admin' => true,
        ]);

        $product = Products::factory(30)->create();

        // $product->colors()->attach([$white->id, $black->id]);
        
        

        

        

        

        
    }
}
