<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
        // Run the CategorySeeder

        $this->call(CategoriesTableSeeder::class);

        // Run the ProductSeeder
        $this->call(ProductsTableSeeder::class);
        $this->call(UserSeeder::class);

    }
}
