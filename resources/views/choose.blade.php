@extends('layouts.app') @section('title','アンチピック結果')
@section('content')
<div style="padding: 0 4px;">

    <!-- 敵チーム表示 -->
    <div style="
        background: linear-gradient(135deg, #1e2535, #252d3d);
        border: 1px solid #2a3348;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 24px;
        text-align: center;
    ">
        <h2 style="font-size: 0.9rem; color: #8892a4; font-weight: 600; margin-bottom: 12px; letter-spacing: 0.05em; text-transform: uppercase;">
            <i class="bi bi-people-fill" style="margin-right: 6px; color: #ef4444;"></i>選択した敵チーム
        </h2>
        <div class="opponent-character-list">
            @foreach($opponent_characters as $opponent_character)
                <div class="opponent-character-card">
                    <img src="{{ $opponent_character->image_url }}" alt="{{ $opponent_character->name }}" />
                    <p>{{ $opponent_character->name }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- 結果ヘッダー -->
    <div style="text-align: center; margin-bottom: 8px;">
        <h1 style="font-size: 1.4rem; font-weight: 800; color: #e8eaf6; margin-bottom: 4px;">
            <i class="bi bi-trophy-fill" style="color: #f5c518; margin-right: 8px;"></i>あなたが選ぶべきキャラクター
        </h1>
        <p style="font-size: 0.78rem; color: #3a4560;">相性スコアの高い順にランキング形式で表示しています</p>
    </div>

    <!-- ランキング結果 -->
    <div class="chosen-characters" style="background: #1e2535; border: 1px solid #2a3348; border-radius: 12px; padding: 8px 0 16px; margin-bottom: 8px;">
        @foreach($groupedCharacters as $rank => $characters)
            <div class="rank-header rank{{ $rank }}">
                <i class="bi bi-trophy-fill"></i>
                @if($rank == 1) 🥇 @elseif($rank == 2) 🥈 @elseif($rank == 3) 🥉 @endif
                {{ $rank }} 位
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

    <a href="{{ route('select') }}" class="return">
        <i class="bi bi-arrow-repeat" style="margin-right: 6px;"></i>ロールとキャラクターを選びなおす
    </a>

</div>
@endsection
