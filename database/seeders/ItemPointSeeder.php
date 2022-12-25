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
                'item_id' => 11,
                'point_id' => 11
            ],
            [
                'item_id' => 21,
                'point_id' => 21
            ],
            [
                'item_id' => 31,
                'point_id' => 31
            ],
            [
                'item_id' => 41,
                'point_id' => 41
            ],
            [
                'item_id' => 51,
                'point_id' => 51
            ],
            [
                'item_id' => 61,
                'point_id' => 1
            ],
            [
                'item_id' => 71,
                'point_id' => 11
            ],
            [
                'item_id' => 81,
                'point_id' => 21
            ],
            [
                'item_id' => 91,
                'point_id' => 31
            ],
            [
                'item_id' => 101,
                'point_id' => 41
            ],
            [
                'item_id' => 111,
                'point_id' => 51
            ]
            ]);
    }
}
