<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('item_size')->insert([
            [
                'item_id' => 1,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 2,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 3,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 4,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 5,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 6,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 7,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 8,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 9,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 10,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 11,
                'size_id' => rand(1, 3)
            ],
            [
                'item_id' => 12,
                'size_id' => rand(1, 3)
            ]
            ]);
    }
}
