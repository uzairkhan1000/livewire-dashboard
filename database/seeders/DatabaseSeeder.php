<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ColorSeeder::class,
            SizeSeeder::class,
            ProductVariantSeeder::class,
            // Add more seeders if needed
        ]);
        
        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@softui.com',
        //     'password' => Hash::make('secret')
        // ]);


    }
}
