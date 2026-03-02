@extends('layouts.app') @section('title','キャラ、ロール選択')
@section('content')
<div class="bg-white py-3">
<div class="opponent-characters">
    <h2>敵のキャラクター</h2>
    <div class="opponent-character-list">
        @foreach($opponent_characters as $opponent_character)
            <div class="opponent-character-card">
                <img src="{{ $opponent_character->image_url }}" alt="{{ $opponent_character->name }}" />
                <p>{{ $opponent_character->name }}</p>
            </div>
        @endforeach
    </div>
</div>
<div class="chosen-characters">
    <h1>あなたが選ぶべきキャラクター</h1>
    @foreach($groupedCharacters as $rank => $characters)
        <div class="rank-header rank{{ $rank }}">
            <i class="bi bi-trophy-fill"></i> {{ $rank }} 位
        </div>

        <div class="chosen-character-list">
            @foreach($characters as $character)
                <div class="chosen-character-card">
                    <img src="{{ $character->image_url }}" alt="{{ $character->name }}" />
                    <p>{{ $character->name }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
    <a href="{{ route('select') }}" class="return">ロールとキャラクターを選びなおす</a>
</div>
@endsection