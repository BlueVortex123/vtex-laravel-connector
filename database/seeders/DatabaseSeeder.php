<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use App\Services\VtexCategoryService;
use Database\Seeders\VtexExportedProductSeeder;
use Database\Seeders\VtexSkuSpecificationValuesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            VtexExportedProductSeeder::class,
            app(VtexCategoryService::class)->mapCategories(),
            app(VtexCategoryService::class)->fillIdsToCategories(),
            VtexSpecificationGroupSeeder::class,
            VtexSkuSpecificationsSeeder::class,
            VtexSkuSpecificationValuesSeeder::class,
        ]);
    }
}
