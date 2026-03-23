@extends('layouts.app')
@section('title', $character->name . ' カウンター・天敵まとめ | OW アンチピックチェッカー')
@section('description', $character->name . 'のカウンターキャラと天敵キャラをまとめました。相性データをもとに有利・不利な相手を確認できます。')
@section('content')
<div style="padding: 0 4px;">

    {{-- ヒーローヘッダー --}}
    <div style="
        background: linear-gradient(135deg, #1e2535, #252d3d);
        border: 1px solid #2a3348;
        border-radius: 12px;
        padding: 24px 20px;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 20px;
    ">
        <img src="{{ $character->image_url }}" alt="{{ $character->name }}"
            style="width: 80px; height: 80px; border-radius: 12px; object-fit: cover; border: 2px solid #4a9eff; flex-shrink: 0;">
        <div>
            <div style="margin-bottom: 6px;">
                @if($character->role === 'タンク')
                    <span style="font-size: 0.72rem; background: rgba(74,158,255,0.15); color: #4a9eff; padding: 2px 10px; border-radius: 12px; border: 1px solid rgba(74,158,255,0.3); font-weight: 700;">🛡️ タンク</span>
                @elseif($character->role === 'ダメージ')
                    <span style="font-size: 0.72rem; background: rgba(239,68,68,0.15); color: #ef4444; padding: 2px 10px; border-radius: 12px; border: 1px solid rgba(239,68,68,0.3); font-weight: 700;">⚔️ ダメージ</span>
                @elseif($character->role === 'サポート')
                    <span style="font-size: 0.72rem; background: rgba(74,222,128,0.15); color: #4ade80; padding: 2px 10px; border-radius: 12px; border: 1px solid rgba(74,222,128,0.3); font-weight: 700;">💚 サポート</span>
                @endif
            </div>
            <h1 style="font-size: 1.6rem; font-weight: 800; color: #e8eaf6; margin: 0 0 4px;">{{ $character->name }}</h1>
            <p style="font-size: 0.8rem; color: #5a6278; margin: 0;">{{ $character->name_en }}</p>
        </div>
        <div class="ms-auto" style="text-align: right;">
            <a href="{{ route('weakness') }}?hero={{ urlencode($character->name) }}"
                style="display: inline-block; font-size: 0.78rem; background: rgba(239,68,68,0.12); color: #ef4444; border: 1px solid rgba(239,68,68,0.3); border-radius: 8px; padding: 6px 12px; text-decoration: none; font-weight: 600;">
                <i class="bi bi-shield-exclamation" style="margin-right: 4px;"></i>天敵チェック
            </a>
        </div>
    </div>

    {{-- このキャラが有利な相手 --}}
    <div style="margin-bottom: 28px;">
        <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
            <span style="background: rgba(74,222,128,0.12); border: 1px solid rgba(74,222,128,0.3); border-radius: 8px; padding: 4px 12px; color: #4ade80; font-size: 0.85rem;">
                <i class="bi bi-arrow-up-circle-fill" style="margin-right: 4px;"></i>{{ $character->name }} が有利な相手
            </span>
            <span style="font-size: 0.75rem; color: #3a4560; font-weight: 400;">{{ $counters->count() }}体</span>
        </h2>

        @if($counters->isEmpty())
            <p style="color: #5a6278; font-size: 0.85rem; padding: 16px; background: #1e2535; border-radius: 8px; border: 1px solid #2a3348;">データなし</p>
        @else
            <div style="display: grid; gap: 8px;">
                @foreach($counters as $relation)
                    @if($relation->toHero)
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
                        <a href="{{ route('hero.show', $relation->toHero->slug) }}" style="text-decoration: none; flex-shrink: 0;">
                            <img src="{{ $relation->toHero->image_url }}" alt="{{ $relation->toHero->name }}"
                                style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover; border: 1px solid #2a3348; transition: border-color 0.2s;"
                                onmouseover="this.style.borderColor='#4a9eff'" onmouseout="this.style.borderColor='#2a3348'">
                        </a>
                        <div style="flex: 1; min-width: 0;">
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px; flex-wrap: wrap;">
                                <a href="{{ route('hero.show', $relation->toHero->slug) }}"
                                    style="font-size: 0.9rem; font-weight: 700; color: #c8d0e0; text-decoration: none;"
                                    onmouseover="this.style.color='#4a9eff'" onmouseout="this.style.color='#c8d0e0'">
                                    {{ $relation->toHero->name }}
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
    </div>

    {{-- このキャラの天敵 --}}
    <div style="margin-bottom: 28px;">
        <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
            <span style="background: rgba(239,68,68,0.12); border: 1px solid rgba(239,68,68,0.3); border-radius: 8px; padding: 4px 12px; color: #ef4444; font-size: 0.85rem;">
                <i class="bi bi-arrow-down-circle-fill" style="margin-right: 4px;"></i>{{ $character->name }} の天敵
            </span>
            <span style="font-size: 0.75rem; color: #3a4560; font-weight: 400;">{{ $weaknesses->count() }}体</span>
        </h2>

        @if($weaknesses->isEmpty())
            <p style="color: #5a6278; font-size: 0.85rem; padding: 16px; background: #1e2535; border-radius: 8px; border: 1px solid #2a3348;">データなし</p>
        @else
            <div style="display: grid; gap: 8px;">
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
                                style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover; border: 1px solid #2a3348; transition: border-color 0.2s;"
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
    </div>

    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <a href="{{ route('select') }}" style="
            display: inline-flex; align-items: center; gap: 6px;
            background: linear-gradient(135deg, #1d4ed8, #4a9eff);
            color: white; border-radius: 8px; padding: 10px 18px;
            font-weight: 700; font-size: 0.85rem; text-decoration: none;
        ">
            <i class="bi bi-search"></i>アンチピックを調べる
        </a>
        <a href="{{ route('weakness') }}" style="
            display: inline-flex; align-items: center; gap: 6px;
            background: #1e2535; color: #8892a4; border: 1px solid #2a3348;
            border-radius: 8px; padding: 10px 18px;
            font-weight: 600; font-size: 0.85rem; text-decoration: none;
        ">
            <i class="bi bi-shield-exclamation"></i>天敵チェッカーへ
        </a>
    </div>

</div>
@endsection
