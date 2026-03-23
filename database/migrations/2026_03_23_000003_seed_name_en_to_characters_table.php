<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $nameEnMap = [
            'D.VA'              => 'D.Va',
            'ウィンストン'       => 'Winston',
            'オリーサ'           => 'Orisa',
            'ザリア'             => 'Zarya',
            'シグマ'             => 'Sigma',
            'ジャンカー・クイーン' => 'Junker Queen',
            'ドゥームフィスト'    => 'Doomfist',
            'マウガ'             => 'Mauga',
            'ラインハルト'        => 'Reinhardt',
            'ラマットラ'          => 'Ramattra',
            'レッキング・ボール'   => 'Wrecking Ball',
            'ロードホッグ'        => 'Roadhog',
            'アッシュ'           => 'Ashe',
            'ウィドウメイカー'    => 'Widowmaker',
            'エコー'             => 'Echo',
            'キャスディ'          => 'Cassidy',
            'ゲンジ'             => 'Genji',
            'シンメトラ'          => 'Symmetra',
            'ジャンクラット'       => 'Junkrat',
            'ソジョーン'          => 'Sojourn',
            'ソルジャー'          => 'Soldier: 76',
            'ソンブラ'            => 'Sombra',
            'トールビョーン'       => 'Torbjörn',
            'トレーサー'           => 'Tracer',
            'ハンゾー'             => 'Hanzo',
            'バスティオン'         => 'Bastion',
            'ファラ'              => 'Pharah',
            'メイ'               => 'Mei',
            'リーパー'            => 'Reaper',
            'ベンチャー'           => 'Venture',
            'アナ'               => 'Ana',
            'イラリー'            => 'Illari',
            'キリコ'              => 'Kiriko',
            'ゼニヤッタ'           => 'Zenyatta',
            'バティスト'           => 'Baptiste',
            'ブリギッテ'           => 'Brigitte',
            'マーシー'             => 'Mercy',
            'モイラ'              => 'Moira',
            'ライフウィーバー'     => 'Lifeweaver',
            'ルシオ'              => 'Lúcio',
            'ウーヤン'             => 'Wu Yang',
            'ハザード'             => 'Hazard',
            'フレイヤ'             => 'Freja',
            'ジュノ'              => 'Juno',
            'ドミナ'              => 'Domina',
            'ミズキ'              => 'Mizuki',
            'アンラン'             => 'Anran',
            'エムレ'               => 'Emre',
            'ジェットパックキャット' => 'Jetpack Cat',
            'ヴェンデッタ'          => 'Vendetta',
        ];

        foreach ($nameEnMap as $nameJa => $nameEn) {
            DB::table('characters')
                ->where('name', $nameJa)
                ->update(['name_en' => $nameEn]);
        }
    }

    public function down(): void
    {
        DB::table('characters')->update(['name_en' => null]);
    }
};
