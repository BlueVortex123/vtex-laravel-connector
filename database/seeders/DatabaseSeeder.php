<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\VtexCategory;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\VtexExportedProduct;
use Database\Seeders\VtexExportedProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            VtexExportedProductSeeder::class,
            app(VtexCategoryService::class)->mapCategories()
        ]);
    }
}
