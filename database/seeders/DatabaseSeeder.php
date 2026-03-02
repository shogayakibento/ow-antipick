<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\CharacterRelation;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // キャラクターデータ
        // ここに実際のキャラデータを入れてください
        // 例:
        // $characters = [
        //     ['name' => 'D.Va',       'role' => 'タンク',    'image_url' => '/images/dva.png'],
        //     ['name' => 'Reinhardt',  'role' => 'タンク',    'image_url' => '/images/reinhardt.png'],
        //     ['name' => 'Genji',      'role' => 'ダメージ',  'image_url' => '/images/genji.png'],
        //     ['name' => 'Ana',        'role' => 'サポート',  'image_url' => '/images/ana.png'],
        // ];
        // foreach ($characters as $data) {
        //     Character::create($data);
        // }

        // スコアデータ（DBに直接入れていたデータをここに移植してください）
        // character_id: 自分のキャラのid
        // to_hero_id:   相手キャラのid
        // score:        有利度（例：2点、1点）
        // 例:
        // $relations = [
        //     ['character_id' => 1, 'to_hero_id' => 3, 'score' => 2],
        //     ['character_id' => 1, 'to_hero_id' => 4, 'score' => 1],
        // ];
        // foreach ($relations as $data) {
        //     CharacterRelation::create($data);
        // }
    }
}
