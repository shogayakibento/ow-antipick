@extends('layouts.app')
@section('title', $hero->name . ' の天敵キャラ一覧 | OW アンチピックチェッカー')
@section('description', $hero->name . 'に強いキャラ（天敵）をランキング形式で表示します。オーバーウォッチの対策に役立てよう。')
@section('content')
<div style="padding: 0 4px;">

    {{-- 選択キャラ表示 --}}
    <div style="
        background: linear-gradient(135deg, #1e1520, #251d35);
        border: 1px solid rgba(239,68,68,0.25);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 16px;
    ">
        <img src="{{ $hero->image_url }}" alt="{{ $hero->name }}"
            style="width: 64px; height: 64px; border-radius: 10px; object-fit: cover; border: 2px solid rgba(239,68,68,0.5); flex-shrink: 0;">
        <div>
            <p style="font-size: 0.75rem; color: #ef4444; font-weight: 700; margin-bottom: 4px; letter-spacing: 0.05em; text-transform: uppercase;">
                <i class="bi bi-person-fill" style="margin-right: 4px;"></i>選択したキャラ
            </p>
            <h1 style="font-size: 1.3rem; font-weight: 800; color: #e8eaf6; margin: 0 0 2px;">{{ $hero->name }}</h1>
            <p style="font-size: 0.78rem; color: #5a6278; margin: 0;">{{ $hero->name_en }}</p>
        </div>
        <div class="ms-auto">
            <a href="{{ route('hero.show', $hero->slug) }}"
                style="display: inline-block; font-size: 0.75rem; background: rgba(74,158,255,0.1); color: #4a9eff; border: 1px solid rgba(74,158,255,0.25); border-radius: 8px; padding: 5px 10px; text-decoration: none; font-weight: 600;">
                <i class="bi bi-info-circle" style="margin-right: 3px;"></i>詳細
            </a>
        </div>
    </div>

    {{-- 結果ヘッダー --}}
    <div style="text-align: center; margin-bottom: 16px;">
        <h2 style="font-size: 1.1rem; font-weight: 800; color: #e8eaf6; margin-bottom: 4px;">
            <i class="bi bi-shield-exclamation" style="color: #ef4444; margin-right: 8px;"></i>{{ $hero->name }} の天敵キャラ
        </h2>
        <p style="font-size: 0.78rem; color: #3a4560;">
            スコアの高い順に表示 &nbsp;|&nbsp;
            全 {{ $weaknesses->count() }} キャラ
        </p>
    </div>

    {{-- 天敵リスト --}}
    @if($weaknesses->isEmpty())
        <div style="text-align: center; padding: 40px 20px; background: #1e2535; border-radius: 12px; border: 1px solid #2a3348;">
            <p style="color: #5a6278; font-size: 0.9rem;">天敵データがありません</p>
        </div>
    @else
        <div style="display: grid; gap: 8px; margin-bottom: 24px;">
            @foreach($weaknesses as $relation)
                @if($relation->character)
                <div style="
                    background: #1e2535;
                    border: 1px solid #2a3348;
                    border-left: 3px solid {{ $relation->score >= 2 ? '#ef4444' : '#f59e0b' }};
                    border-radius: 8px;
                    padding: 12px 14px;
                    display: flex;
                    align-items: flex-start;
                    gap: 12px;
                ">
                    <a href="{{ route('hero.show', $relation->character->slug) }}" style="text-decoration: none; flex-shrink: 0;">
                        <img src="{{ $relation->character->image_url }}" alt="{{ $relation->character->name }}"
                            style="width: 48px; height: 48px; border-radius: 8px; object-fit: cover; border: 1px solid #2a3348; transition: border-color 0.2s;"
                            onmouseover="this.style.borderColor='#ef4444'" onmouseout="this.style.borderColor='#2a3348'">
                    </a>
                    <div style="flex: 1; min-width: 0;">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px; flex-wrap: wrap;">
                            <a href="{{ route('hero.show', $relation->character->slug) }}"
                                style="font-size: 0.9rem; font-weight: 700; color: #c8d0e0; text-decoration: none;"
                                onmouseover="this.style.color='#ef4444'" onmouseout="this.style.color='#c8d0e0'">
                                {{ $relation->character->name }}
                            </a>
                            @if($relation->score >= 2)
                                <span style="font-size: 0.65rem; background: rgba(239,68,68,0.2); color: #ef4444; padding: 1px 7px; border-radius: 10px; border: 1px solid rgba(239,68,68,0.3); font-weight: 700;">強カウンター</span>
                            @else
                                <span style="font-size: 0.65rem; background: rgba(245,158,11,0.2); color: #f59e0b; padding: 1px 7px; border-radius: 10px; border: 1px solid rgba(245,158,11,0.3); font-weight: 700;">有利</span>
                            @endif
                        </div>
                        @if($relation->reason)
                            <p style="font-size: 0.82rem; color: #8892a4; line-height: 1.65; margin: 0;">{{ $relation->reason }}</p>
                        @endif
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @endif

    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('weakness') }}" style="
            display: inline-flex; align-items: center; gap: 6px;
            background: linear-gradient(135deg, #7c1d1d, #ef4444);
            color: white; border-radius: 8px; padding: 10px 18px;
            font-weight: 700; font-size: 0.85rem; text-decoration: none;
        ">
            <i class="bi bi-arrow-repeat"></i>別のキャラを選ぶ
        </a>
        <a href="{{ route('select') }}" style="
            display: inline-flex; align-items: center; gap: 6px;
            background: #1e2535; color: #8892a4; border: 1px solid #2a3348;
            border-radius: 8px; padding: 10px 18px;
            font-weight: 600; font-size: 0.85rem; text-decoration: none;
        ">
            <i class="bi bi-search"></i>アンチピックを調べる
        </a>
    </div>

</div>
@endsection
