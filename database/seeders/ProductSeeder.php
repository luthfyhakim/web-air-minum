<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Air Galon 19L',
                'brand' => 'SWA',
                'weight' => '18 kg',
                'size' => '26x26x50cm',
                'stock' => 100,
                'price' => 19000,
                'image' => 'product.png',
            ],
            [
                'name' => 'Air Gelas 240ML',
                'brand' => 'SWA',
                'weight' => '18 kg',
                'size' => '26x26x50cm',
                'stock' => 100,
                'price' => 19000,
                'image' => 'product.png',
            ],
            [
                'name' => 'Air Botol 1500ML',
                'brand' => 'SWA',
                'weight' => '18 kg',
                'size' => '26x26x50cm',
                'stock' => 100,
                'price' => 19000,
                'image' => 'product.png',
            ],
            [
                'name' => 'Air Botol 600ML',
                'brand' => 'SWA',
                'weight' => '18 kg',
                'size' => '26x26x50cm',
                'stock' => 100,
                'price' => 19000,
                'image' => 'product.png',
            ],
            [
                'name' => 'Air Botol 330ML',
                'brand' => 'SWA',
                'weight' => '18 kg',
                'size' => '26x26x50cm',
                'stock' => 100,
                'price' => 19000,
                'image' => 'product.png',
            ],
            [
                'name' => 'Air Botol 1500ML',
                'brand' => 'SWA',
                'weight' => '18 kg',
                'size' => '26x26x50cm',
                'stock' => 100,
                'price' => 19000,
                'image' => 'product.png',
            ],
            [
                'name' => 'Air Botol 600ML',
                'brand' => 'SWA',
                'weight' => '18 kg',
                'size' => '26x26x50cm',
                'stock' => 100,
                'price' => 19000,
                'image' => 'product.png',
            ],
            [
                'name' => 'Air Botol 330ML',
                'brand' => 'SWA',
                'weight' => '18 kg',
                'size' => '26x26x50cm',
                'stock' => 100,
                'price' => 19000,
                'image' => 'product.png',
            ],
        ]);
    }
}
