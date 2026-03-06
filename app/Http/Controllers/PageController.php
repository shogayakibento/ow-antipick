<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class PageController extends Controller
{
    //トップページ
    public function index(){
        return view('index');
    }

    public function select(){
    $characters = Character::all();
    return view('select', compact('characters'));
    }

    public function about(){
        return view('about');
    }

    public function choose(Request $request)
{
    $validatedData = $request->validate([
        'role' => 'required|string|max:255',
        'character' => 'required|array|max:5',
        'character.*' => 'string|max:255',
    ]);

    $selectedRole = $validatedData['role'];
    $selected_characters = $validatedData['character'];

    $characters = Character::all();

    // 候補ロールのキャラ（自分側）
    $candidate_role = $characters->where('role', $selectedRole);

    // 相手側のキャラ
    $opponent_characters = $characters->whereIn('name', $selected_characters);
    $opponent_characters_id = $opponent_characters->pluck('id');

    // 各キャラのスコア（score合計）を計算
    $scores = [];
    foreach ($candidate_role as $character) {
        $totalScore = $character->characterRelations()
            ->whereIn('to_hero_id', $opponent_characters_id)
            ->sum('score'); // ★ count() じゃなくて score 合計

        $scores[$character->id] = $totalScore;
    }

    // score合計の降順で並べ替え
    $sortedCharacters = $candidate_role->sortByDesc(function ($character) use ($scores) {
        return $scores[$character->id] ?? 0;
    });

    // ランキング計算（同点同順位・次は飛ばさない）
    $rank = 0;
    $displayRank = 0;
    $prevScore = null;

    foreach ($sortedCharacters as $character) {
        $score = $scores[$character->id] ?? 0;

        if ($score !== $prevScore) {
            $rank++;
            $displayRank = $rank;
        }

        $character->rank = $displayRank; // キャラに順位をセット
        $prevScore = $score;
    }

    // rankごとにグループ化
    $groupedCharacters = $sortedCharacters->groupBy('rank');

    // 各キャラの理由を収集（敵キャラ別）
    $reasons = [];
    foreach ($candidate_role as $character) {
        $relations = $character->characterRelations()
            ->whereIn('to_hero_id', $opponent_characters_id)
            ->get();

        $reasons[$character->id] = [];
        foreach ($relations as $relation) {
            $opponentChar = $characters->find($relation->to_hero_id);
            if ($opponentChar && $relation->reason) {
                $reasons[$character->id][] = [
                    'opponent_name' => $opponentChar->name,
                    'opponent_image' => $opponentChar->image_url,
                    'reason' => $relation->reason,
                    'score' => $relation->score,
                ];
            }
        }
    }

    return view('choose', compact('groupedCharacters', 'scores', 'opponent_characters', 'reasons'));
}

}

/*
    $roleCharacterIds=Character::where('role',$selectedRole)->pluck('id');
    $characterRelations = CharacterRelation::whereIn('character_id', $roleCharacterIds)->get();
*/