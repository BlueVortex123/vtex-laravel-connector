<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\VtexSpecificationsService;

class VtexSpecificationGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(VtexSpecificationsService::class)->createSpecificationGroup();
    }
}
