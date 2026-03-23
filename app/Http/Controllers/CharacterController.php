<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Character;

class CharacterController extends Controller
{
    // ========== Hero Detail ==========

    public function show(string $slug)
    {
        $characters = Character::with(['characterRelations.toHero', 'counterRelations.character'])->get();
        $character = $characters->first(fn($c) => $c->slug === $slug);

        if (!$character) {
            abort(404);
        }

        $counters = $character->characterRelations->sortByDesc('score');
        $weaknesses = $character->counterRelations->sortByDesc('score');

        return view('heroes.show', compact('character', 'counters', 'weaknesses'));
    }

    public function showEn(string $slug)
    {
        $characters = Character::with(['characterRelations.toHero', 'counterRelations.character'])->get();
        $character = $characters->first(fn($c) => $c->slug === $slug);

        if (!$character) {
            abort(404);
        }

        $counters = $character->characterRelations->sortByDesc('score');
        $weaknesses = $character->counterRelations->sortByDesc('score');

        return view('en.heroes.show', compact('character', 'counters', 'weaknesses'));
    }

    // ========== Weakness ==========

    public function weakness()
    {
        $characters = Character::all();
        return view('weakness', compact('characters'));
    }

    public function weaknessResult(Request $request)
    {
        $validated = $request->validate([
            'character' => 'required|string|max:255',
        ]);

        $characters = Character::with(['counterRelations.character'])->get();
        $hero = $characters->firstWhere('name', $validated['character']);

        if (!$hero) {
            abort(404);
        }

        $weaknesses = $hero->counterRelations->sortByDesc('score');

        return view('weakness_result', compact('hero', 'weaknesses'));
    }

    public function weaknessEn()
    {
        $characters = Character::all();
        return view('en.weakness', compact('characters'));
    }

    public function weaknessResultEn(Request $request)
    {
        $validated = $request->validate([
            'character' => 'required|string|max:255',
        ]);

        $characters = Character::with(['counterRelations.character'])->get();
        $hero = $characters->firstWhere('name_en', $validated['character']);

        if (!$hero) {
            abort(404);
        }

        $weaknesses = $hero->counterRelations->sortByDesc('score');

        return view('en.weakness_result', compact('hero', 'weaknesses'));
    }
}
