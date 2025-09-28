<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Air Max 90',
                'description' => 'Classic Nike sneakers for everyday wear.',
                'price' => 120.00,
                'stock' => 50,
                'sku' => 'NIKE-AM90',
                'brand_id' => 1, // Nike
                'category_id' => 1, // Sneakers
                'attributes' => json_encode(['color' => 'White', 'size' => '10']),
            ],
            [
                'name' => 'Ultraboost 22',
                'description' => 'High-performance running shoes by Adidas.',
                'price' => 180.00,
                'stock' => 30,
                'sku' => 'ADIDAS-UB22',
                'brand_id' => 2, // Adidas
                'category_id' => 6, // Running Shoes
                'attributes' => json_encode(['color' => 'Black', 'size' => '9']),
            ],
            [
                'name' => 'Classic Loafers',
                'description' => 'Elegant loafers for casual occasions.',
                'price' => 85.00,
                'stock' => 20,
                'sku' => 'PUMA-CLF',
                'brand_id' => 3, // Puma
                'category_id' => 2, // Loafers
                'attributes' => json_encode(['color' => 'Brown', 'size' => '8']),
            ],
            [
                'name' => 'Hiking Boots',
                'description' => 'Durable boots for outdoor adventures.',
                'price' => 150.00,
                'stock' => 15,
                'sku' => 'REEBOK-HB',
                'brand_id' => 4, // Reebok
                'category_id' => 4, // Boots
                'attributes' => json_encode(['color' => 'Gray', 'size' => '11']),
            ],
            [
                'name' => 'Office Formal Shoes',
                'description' => 'Perfect formal shoes for office wear.',
                'price' => 95.00,
                'stock' => 25,
                'sku' => 'UA-OFS',
                'brand_id' => 5, // Under Armour
                'category_id' => 5, // Formal Shoes
                'attributes' => json_encode(['color' => 'Black', 'size' => '9']),
            ],
            [
                'name' => 'Trail Running Shoes',
                'description' => 'Designed for trail running enthusiasts.',
                'price' => 140.00,
                'stock' => 10,
                'sku' => 'NB-TRS',
                'brand_id' => 6, // New Balance
                'category_id' => 12, // Trail Shoes
                'attributes' => json_encode(['color' => 'Green', 'size' => '10']),
            ],
            [
                'name' => 'Women\'s Heels',
                'description' => 'Stylish heels for formal events.',
                'price' => 75.00,
                'stock' => 40,
                'sku' => 'ASICS-WH',
                'brand_id' => 7, // Asics
                'category_id' => 8, // Heels
                'attributes' => json_encode(['color' => 'Red', 'size' => '7']),
            ],
            [
                'name' => 'Casual Flip Flops',
                'description' => 'Comfortable flip flops for casual wear.',
                'price' => 25.00,
                'stock' => 60,
                'sku' => 'CONVERSE-CFF',
                'brand_id' => 8, // Converse
                'category_id' => 9, // Flip Flops
                'attributes' => json_encode(['color' => 'Blue', 'size' => '10']),
            ],
            [
                'name' => 'Beach Sandals',
                'description' => 'Lightweight sandals for the beach.',
                'price' => 30.00,
                'stock' => 35,
                'sku' => 'VANS-BS',
                'brand_id' => 9, // Vans
                'category_id' => 3, // Sandals
                'attributes' => json_encode(['color' => 'Yellow', 'size' => '8']),
            ],
            [
                'name' => 'Work Boots',
                'description' => 'Heavy-duty boots for work environments.',
                'price' => 160.00,
                'stock' => 12,
                'sku' => 'FILA-WB',
                'brand_id' => 10, // Fila
                'category_id' => 13, // Work Boots
                'attributes' => json_encode(['color' => 'Black', 'size' => '11']),
            ],
        ]);
    }
}
