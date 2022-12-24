<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Point;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Point::create([
            'name' => '全方位フィット',
            'detailA' => 'おなかとお尻をやさしく包む、らくらく設計。締め付けないからおなからくらく！よく伸びるからはくのもらくらく！',
            'detailB' => 'モレやすい背中まわりと下腹部は集中的にぴったりとフィット。',
            'detailC' => '尿道口と吸収体がしっかり密着するから、モレを防ぎます。'
        ]);
        Point::create([
            'name' => 'らくらくギャザー付き',
            'detailA' => 'パンツをはく時に、ギャザーが外側へ開いているため足がひっかかりにくく、おむつ交換がスムーズです。また交換時の転倒防止にもつながります。',
            'detailB' => '尿とりパッドのホールドエリアが広いから,さまざまなパッドにも対応します。',
            'detailC' => '尿とりパッドと一緒にパンツを引き上げる時に、ギャザーがスイングしてパッドを包み込むため、モレを防ぎます。'
        ]);
        Point::create([
            'name' => 'ソフト肌当たり',
            'detailA' => ' 厚手でふんわりとした生地でありながら、「うす型」、そして安心の3回以上吸収を実現。'
        ]);
        Point::create([
            'name' => 'スピード吸収',
            'detailA' => '尿が吸収体の内部で、素早く拡散・吸収するため、さまざまな体勢でもモレを防ぎ、長時間はいていても安心です。'
        ]);
        Point::create([
            'name' => '交換お知らせサイン',
            'detailA' => 'おむつフロント部分にあるブルーの二重ラインが排尿があると消えるため、交換のタイミングが一目でわかります。'
        ]);
        Point::create([
            'name' => 'ムレ・ズレ防止機能',
            'detailA' => '全面通気シートを内蔵しており、ムレを防ぎます。',
            'detailB' => '外側には粘着テープを設置しており、使用中のズレを防止。'
        ]);
    }
}
