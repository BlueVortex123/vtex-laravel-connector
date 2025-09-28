<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['description' => 'Nike'],
            ['description' => 'Adidas'],
            ['description' => 'Puma'],
            ['description' => 'Reebok'],
            ['description' => 'Under Armour'],
            ['description' => 'New Balance'],
            ['description' => 'Asics'],
            ['description' => 'Converse'],
            ['description' => 'Vans'],
            ['description' => 'Fila'],
        ]);
    }
}
