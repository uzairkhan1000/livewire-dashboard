<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming you have products, colors, and sizes created already
        $products = Product::all();
        $colors = Color::all();
        $sizes = Size::all();

        foreach ($products as $product) {
            // Generate random variants for each product
            for ($i = 0; $i < 4; $i++) {
                $color = $colors->random();
                $size = $sizes->random();

                ProductColor::create([
                    'product_id' => $product->id,
                    'color_id' => $color->id,
                    // Add other variant-related fields if needed
                ]);
                ProductSize::create([
                    'product_id' => $product->id,
                    'size_id' => $size->id,
                    // Add other variant-related fields if needed
                ]);
            }
        }
    }
}
