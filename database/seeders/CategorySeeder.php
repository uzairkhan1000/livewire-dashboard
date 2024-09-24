<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Shirts',
                'description' => 'Various types of shirts for men and women.',
            ],
            [
                'name' => 'Pants',
                'description' => 'Different styles of pants and trousers.',
            ],
            [
                'name' => 'Shoes',
                'description' => 'All types of footwear for different occasions.',
            ],
            [
                'name' => 'Hats',
                'description' => 'Stylish hats and caps to accessorize your outfit.',
            ],
            // Add more categories if needed
        ];

        // Insert the categories into the database
        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
