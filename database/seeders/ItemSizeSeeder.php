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
                'size_id' => 1
            ],
            [
                'item_id' => 11,
                'size_id' => 11
            ],
            [
                'item_id' => 21,
                'size_id' => 21
            ],
            [
                'item_id' => 31,
                'size_id' => 1
            ],
            [
                'item_id' => 41,
                'size_id' => 11
            ],
            [
                'item_id' => 51,
                'size_id' => 21
            ],
            [
                'item_id' => 61,
                'size_id' => 1
            ],
            [
                'item_id' => 71,
                'size_id' => 11
            ],
            [
                'item_id' => 81,
                'size_id' => 21
            ],
            [
                'item_id' => 91,
                'size_id' => 1
            ],
            [
                'item_id' => 101,
                'size_id' => 11
            ],
            [
                'item_id' => 111,
                'size_id' => 21
            ]
            ]);
    }
}
