<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Sneakers', 'description' => 'Sport sneakers', 'full_category_path' => 'Shoes>Sport>Sneakers'],
            ['name' => 'Loafers', 'description' => 'Casual loafers', 'full_category_path' => 'Shoes>Casual>Loafers'],
            ['name' => 'Sandals', 'description' => 'Beach sandals', 'full_category_path' => 'Shoes>Casual>Sandals'],
            ['name' => 'Boots', 'description' => 'Hiking boots', 'full_category_path' => 'Shoes>Outdoor>Boots'],
            ['name' => 'Formal Shoes', 'description' => 'Office wear', 'full_category_path' => 'Shoes>Formal>Office'],
            ['name' => 'Running Shoes', 'description' => 'For running', 'full_category_path' => 'Shoes>Sport>Running'],
            ['name' => 'Slippers', 'description' => 'Indoor slippers', 'full_category_path' => 'Shoes>Casual>Slippers'],
            ['name' => 'Heels', 'description' => 'Women\'s heels', 'full_category_path' => 'Shoes>Formal>Heels'],
            ['name' => 'Flip Flops', 'description' => 'Casual flip flops', 'full_category_path' => 'Shoes>Casual>Flip Flops'],
            ['name' => 'Clogs', 'description' => 'Comfortable clogs', 'full_category_path' => 'Shoes>Casual>Clogs'],
            ['name' => 'Dress Shoes', 'description' => 'Elegant dress shoes', 'full_category_path' => 'Shoes>Formal>Dress'],
            ['name' => 'Trail Shoes', 'description' => 'Trail running shoes', 'full_category_path' => 'Shoes>Outdoor>Trail'],
            ['name' => 'Work Boots', 'description' => 'Durable work boots', 'full_category_path' => 'Shoes>Outdoor>Work'],
            ['name' => 'Moccasins', 'description' => 'Stylish moccasins', 'full_category_path' => 'Shoes>Casual>Moccasins'],
            ['name' => 'Athletic Shoes', 'description' => 'General athletic shoes', 'full_category_path' => 'Shoes>Sport>Athletic'],
        ]);
    }
}
