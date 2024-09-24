<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['name' => 'Small', 'size' => 'S'],
            ['name' => 'Medium', 'size' => 'M'],
            ['name' => 'Large', 'size' => 'L'],
            // Add more sizes if needed
        ];

        foreach ($sizes as $sizeData) {
            Size::create($sizeData);
        }
    }
}
