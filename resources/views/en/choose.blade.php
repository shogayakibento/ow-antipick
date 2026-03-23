@extends('layouts.app_en') @section('title','Counter Pick Results | OW Anti-Pick Checker')
@section('description','Your optimal counter picks ranked by matchup score. Use these heroes against the enemy team in Overwatch.')
@section('content')
<div style="padding: 0 4px;">

    <!-- Enemy team display -->
    <div style="
        background: linear-gradient(135deg, #1e2535, #252d3d);
        border: 1px solid #2a3348;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 24px;
        text-align: center;
    ">
        <h2 style="font-size: 0.9rem; color: #8892a4; font-weight: 600; margin-bottom: 12px; letter-spacing: 0.05em; text-transform: uppercase;">
            <i class="bi bi-people-fill" style="margin-right: 6px; color: #ef4444;"></i>Selected Enemy Team
        </h2>
        <div class="opponent-character-list">
            @foreach($opponent_characters as $opponent_character)
                <div class="opponent-character-card">
                    <img src="{{ $opponent_character->image_url }}" alt="{{ $opponent_character->name_en }}" />
                    <p>{{ $opponent_character->name_en }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Results header -->
    <div style="text-align: center; margin-bottom: 8px;">
        <h1 style="font-size: 1.4rem; font-weight: 800; color: #e8eaf6; margin-bottom: 4px;">
            <i class="bi bi-trophy-fill" style="color: #f5c518; margin-right: 8px;"></i>Recommended Heroes
        </h1>
        <p style="font-size: 0.78rem; color: #3a4560;">
            Ranked by matchup score &nbsp;|&nbsp;
            <span style="color: #4a9eff;"><i class="bi bi-info-circle-fill"></i> Tap a card to see why</span>
        </p>
    </div>

    <!-- Ranking results -->
    <div class="chosen-characters" style="background: #1e2535; border: 1px solid #2a3348; border-radius: 12px; padding: 8px 0 16px; margin-bottom: 8px;">
        @foreach($groupedCharacters as $rank => $characters)
            <div class="rank-header rank{{ $rank }}">
                <i class="bi bi-trophy-fill"></i>
                @if($rank == 1) 🥇 @elseif($rank == 2) 🥈 @elseif($rank == 3) 🥉 @endif
                Rank {{ $rank }}
                <span style="font-size: 0.8rem; font-weight: 400; margin-left: 8px; opacity: 0.7;">
                    Score: {{ $scores[$characters->first()->id] ?? 0 }}
                </span>
            </div>

            <div class="chosen-character-list">
                @foreach($characters as $idx => $character)
                    {{-- Modal trigger card --}}
                    <div
                        class="chosen-character-card fade-in-card"
                        style="cursor: pointer; animation-delay: {{ $idx * 60 }}ms;"
                        data-bs-toggle="modal"
                        data-bs-target="#modal-{{ $character->id }}"
                    >
                        <img src="{{ $character->image_url }}" alt="{{ $character->name_en }}" />
                        <p style="font-weight: 700; color: #c8d0e0;">{{ $character->name_en }}</p>
                        @if(isset($reasons[$character->id]) && count($reasons[$character->id]) > 0)
                            <div style="font-size: 0.6rem; color: #4a9eff; margin-top: 2px; letter-spacing: 0.03em;">
                                <i class="bi bi-info-circle-fill"></i> See why
                            </div>
                        @endif
                    </div>

                    {{-- Reason modal --}}
                    <div class="modal fade" id="modal-{{ $character->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
                            <div class="modal-content" style="background: #1e2535; border: 1px solid #2a3348; color: #e8eaf6; border-radius: 14px; overflow: hidden;">
                                <div class="modal-header" style="border-color: #2a3348; padding: 14px 18px; background: #252d3d;">
                                    <div style="display: flex; align-items: center; gap: 12px;">
                                        <img src="{{ $character->image_url }}" style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover; border: 2px solid #4a9eff;">
                                        <div>
                                            <h5 class="modal-title" style="margin: 0; font-size: 1rem; font-weight: 700;">{{ $character->name_en }}</h5>
                                            <div style="font-size: 0.75rem; color: #8892a4;">
                                                Score: <span style="color: #4a9eff; font-weight: 700;">{{ $scores[$character->id] ?? 0 }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="margin-left: auto;"></button>
                                </div>
                                <div class="modal-body" style="padding: 16px 18px; max-height: 60vh; overflow-y: auto;">
                                    @if(isset($reasons[$character->id]) && count($reasons[$character->id]) > 0)
                                        <p style="font-size: 0.78rem; color: #5a6278; margin-bottom: 12px;">Favorable matchups against:</p>
                                        @foreach($reasons[$character->id] as $reasonData)
                                            <div style="
                                                margin-bottom: 10px;
                                                padding: 10px 12px;
                                                background: #252d3d;
                                                border-radius: 8px;
                                                border-left: 3px solid {{ $reasonData['score'] >= 2 ? '#ef4444' : '#f59e0b' }};
                                            ">
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                                                    <img src="{{ $reasonData['opponent_image'] }}" style="width: 28px; height: 28px; border-radius: 4px; object-fit: cover;">
                                                    <span style="font-size: 0.82rem; font-weight: 700; color: {{ $reasonData['score'] >= 2 ? '#ef4444' : '#f59e0b' }};">
                                                        vs {{ $reasonData['opponent_name'] }}
                                                    </span>
                                                    @if($reasonData['score'] >= 2)
                                                        <span style="font-size: 0.65rem; background: rgba(239,68,68,0.2); color: #ef4444; padding: 1px 6px; border-radius: 10px; border: 1px solid rgba(239,68,68,0.3);">Hard Counter</span>
                                                    @else
                                                        <span style="font-size: 0.65rem; background: rgba(245,158,11,0.2); color: #f59e0b; padding: 1px 6px; border-radius: 10px; border: 1px solid rgba(245,158,11,0.3);">Favorable</span>
                                                    @endif
                                                </div>
                                                <p style="font-size: 0.83rem; color: #9aa5c4; line-height: 1.65; margin: 0;">{{ $reasonData['reason'] }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        <p style="color: #5a6278; font-size: 0.85rem; text-align: center; padding: 20px 0;">
                                            <i class="bi bi-info-circle" style="margin-right: 6px;"></i>No detailed info available
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <a href="{{ route('en.select') }}" class="return">
        <i class="bi bi-arrow-repeat" style="margin-right: 6px;"></i>Change role or heroes
    </a>

</div>
@endsection
