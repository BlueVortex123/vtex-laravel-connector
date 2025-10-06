<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\VtexSpecificationsService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VtexSkuSpecificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(VtexSpecificationsService::class)->createSpecificationForEveryAttribute();
        app(VtexSpecificationsService::class)->fillIdsToSpecifications();
    }
}
