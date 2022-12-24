<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Size::create([
            'name' => 'S',
            'sheet' => 32,
            'in' => 65,
            'out' => 95,
        ]);
        Size::create([
            'name' => 'M',
            'sheet' => 30,
            'in' => 80,
            'out' => 110,
        ]);
        Size::create([
            'name' => 'L',
            'sheet' => 28,
            'in' => 95,
            'out' => 125,
        ]);
    }
}
