<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('item_point')->insert([
            [
                'item_id' => 1,
                'point_id' => 1
            ],
            [
                'item_id' => 2,
                'point_id' => 2
            ],
            [
                'item_id' => 3,
                'point_id' => 3
            ],
            [
                'item_id' => 4,
                'point_id' => 4
            ],
            [
                'item_id' => 5,
                'point_id' => 5
            ],
            [
                'item_id' => 6,
                'point_id' => 6
            ],
            [
                'item_id' => 7,
                'point_id' => 1
            ],
            [
                'item_id' => 8,
                'point_id' => 2
            ],
            [
                'item_id' => 9,
                'point_id' => 3
            ],
            [
                'item_id' => 10,
                'point_id' => 4
            ],
            [
                'item_id' => 11,
                'point_id' => 5
            ],
            [
                'item_id' => 12,
                'point_id' => 6
            ]
            ]);
    }
}
