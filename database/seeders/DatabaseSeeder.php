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
        \App\Models\User::factory(12)->create();

        $this->call(UserSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(PointSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ItemPointSeeder::class);
        $this->call(ItemSizeSeeder::class);
        \App\Models\Review::factory(12)->create();

    }
}
