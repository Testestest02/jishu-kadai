<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Item::create([
            'user_id' => '1',
            'name' => 'うす型パンツプラス',
            'status' => 'active',
            'type' => 'アウター',
            'sex' => '男女兼用',
            'max' => 'おしっこ2回分',
        ]);
        Item::create([
            'user_id' => '1',
            'name' => 'うす型さらさらパンツ通気性プラス',
            'status' => 'active',
            'type' => 'アウター',
            'sex' => '男女兼用',
            'max' => 'おしっこ3回分',
        ]);
        Item::create([
            'user_id' => '11',
            'name' => '昼1枚安心パンツ 長時間快適プラス',
            'status' => 'active',
            'type' => 'アウター',
            'sex' => '男女兼用',
            'max' => 'おしっこ3回分',
        ]);
        Item::create([
            'user_id' => '11',
            'name' => '夜1枚安心パンツ パッドなしでずっと快適',
            'status' => 'active',
            'type' => 'アウター',
            'sex' => '男女兼用',
            'max' => 'おしっこ5回分',
        ]);
        Item::create([
            'user_id' => '21',
            'name' => 'らくらくあて楽テープ',
            'status' => 'active',
            'type' => 'アウター',
            'sex' => '男女兼用',
            'max' => 'おしっこ3回分',
        ]);
        Item::create([
            'user_id' => '21',
            'name' => 'スーパーらくらくあて楽テープ',
            'status' => 'active',
            'type' => 'アウター',
            'sex' => '男女兼用',
            'max' => 'おしっこ3回分',
        ]);
        Item::create([
            'user_id' => '31',
            'name' => ' 紙パンツ用さらさらパッドプラス',
            'status' => 'active',
            'type' => 'インナー',
            'sex' => '男女兼用',
            'max' => 'おしっこ3回分',
        ]);
        Item::create([
            'user_id' => '31',
            'name' => '紙パンツ用パッド 下着気分',
            'status' => 'active',
            'type' => 'インナー',
            'sex' => '女性用',
            'max' => 'おしっこ1回分',
        ]);
        Item::create([
            'user_id' => '41',
            'name' => '昼1枚安心パッド',
            'status' => 'active',
            'type' => 'インナー',
            'sex' => '男女兼用',
            'max' => 'おしっこ3回分',
        ]);
        Item::create([
            'user_id' => '41',
            'name' => '夜1枚安心パッド',
            'status' => 'active',
            'type' => 'インナー',
            'sex' => '男女兼用',
            'max' => 'おしっこ5回分',
        ]);
        Item::create([
            'user_id' => '51',
            'name' => '尿吸収パッド',
            'status' => 'active',
            'type' => 'インナー',
            'sex' => '男女兼用',
            'max' => 'おしっこ2回分',
        ]);
        Item::create([
            'user_id' => '51',
            'name' => 'ハイパー尿吸収パッド',
            'status' => 'active',
            'type' => 'インナー',
            'sex' => '男女兼用',
            'max' => 'おしっこ5回分',
        ]);
    }
}
