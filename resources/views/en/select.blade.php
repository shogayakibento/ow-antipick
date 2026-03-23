@extends('layouts.app_en') @section('title','Hero & Role Select | OW Anti-Pick Checker')
@section('description','Choose your role and select the enemy team heroes. Up to 5 heroes can be selected. Instantly find counter picks for Overwatch.')
@section('content')
<div style="padding: 0 4px; padding-bottom: 60px;">

    <!-- Role selection -->
    <div style="
        background: linear-gradient(135deg, #1e2535, #252d3d);
        border: 1px solid #2a3348;
        border-radius: 12px;
        padding: 20px 16px;
        margin-bottom: 20px;
        text-align: center;
    ">
        <h2 style="font-size: 1rem; color: #8892a4; font-weight: 600; margin-bottom: 14px; letter-spacing: 0.05em; text-transform: uppercase;">
            <i class="bi bi-person-fill" style="margin-right: 6px; color: #4a9eff;"></i>Select Your Role
        </h2>
        <div class='user-role' style="padding: 0;">
            <button type="button" class="selectable-role tank">
                🛡️ Tank
            </button>
            <button type="button" class="selectable-role damage">
                ⚔️ Damage
            </button>
            <button type="button" class="selectable-role support">
                💚 Support
            </button>
        </div>
        <p style="font-size: 0.75rem; color: #3a4560; margin-top: 10px; margin-bottom: 0;">
            ※ Choose the role you want to play
        </p>
    </div>

    <!-- Enemy hero selection + search -->
    <div style="margin-bottom: 12px;">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 4px;">
            <h2 style="font-size: 1rem; color: #8892a4; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; margin: 0;">
                <i class="bi bi-people-fill" style="margin-right: 6px; color: #ef4444;"></i>Select Enemy Heroes
            </h2>
            <div style="position: relative;">
                <i class="bi bi-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #5a6278; font-size: 0.85rem;"></i>
                <input
                    type="text"
                    id="char-search"
                    placeholder="Filter by name..."
                    style="
                        background: #1e2535;
                        border: 1px solid #2a3348;
                        border-radius: 8px;
                        color: #e8eaf6;
                        font-size: 0.85rem;
                        padding: 7px 12px 7px 30px;
                        outline: none;
                        width: 200px;
                        transition: border-color 0.2s;
                    "
                    onfocus="this.style.borderColor='#4a9eff'"
                    onblur="this.style.borderColor='#2a3348'"
                />
            </div>
        </div>
        <p style="font-size: 0.78rem; color: #3a4560; margin: 0;">Select up to 5 heroes</p>
    </div>

    <!-- Form errors -->
    @if ($errors->any())
    <div class="alert alert-danger" style="margin-bottom: 16px; border-radius: 8px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="character-container">
        <!-- Tank -->
        <div class="tank" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            🛡️ Tank
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'タンク')
                        <div class="character-card char-tank" data-name="{{ $character->name_en }}" style="position: relative;">
                            <img src="{{$character->image_url}}" alt="{{$character->name_en}}" />
                            <p>{{ $character->name_en }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Damage -->
        <div class="damage" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            ⚔️ Damage
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'ダメージ')
                        <div class="character-card char-damage" data-name="{{ $character->name_en }}" style="position: relative;">
                            <img src="{{$character->image_url}}" alt="{{$character->name_en}}">
                            <p>{{ $character->name_en }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Support -->
        <div class="support" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            💚 Support
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'サポート')
                        <div class="character-card char-support" data-name="{{ $character->name_en }}" style="position: relative;">
                            <img src="{{$character->image_url}}" alt="{{$character->name_en}}">
                            <p>{{ $character->name_en }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('en.choose') }}" id="select-form">
        @csrf
        <input type="hidden" name="role" id="selected-role" value=''>
        <input type="hidden" name="character[]" id="selected-character" value=''>
        <div style="text-align: center; padding: 8px 0 4px;">
            <button id='submit' type='submit' disabled style="opacity: 0.4; cursor: not-allowed;">
                <i class="bi bi-search" style="margin-right: 6px;"></i>Find Counter Picks
            </button>
        </div>
    </form>

</div>

<!-- Sticky bar -->
<div id="sticky-bar" style="
    position: fixed;
    bottom: 0; left: 0; right: 0;
    background: #080c14;
    border-top: 1px solid #2a3348;
    z-index: 2000;
    padding: 8px 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    box-shadow: 0 -4px 20px rgba(0,0,0,0.5);
">
    <!-- Slots -->
    <div style="display: flex; gap: 6px; align-items: center;">
        @for($i = 0; $i < 5; $i++)
        <div class="sticky-slot" id="slot-{{ $i }}" style="
            width: 36px; height: 36px;
            border-radius: 6px;
            border: 1px dashed #2a3348;
            background: #1e2535;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
            transition: border-color 0.2s;
        "></div>
        @endfor
    </div>

    <!-- Count -->
    <div style="font-size: 0.8rem; color: #8892a4; white-space: nowrap; min-width: 48px; text-align: center;">
        <span id="sticky-count" style="color: #4a9eff; font-weight: 700; font-size: 1rem;">0</span>/5
    </div>

    <!-- Submit button -->
    <button
        id="sticky-submit"
        type="submit"
        form="select-form"
        disabled
        style="
            background: linear-gradient(135deg, #1d4ed8, #4a9eff);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 700;
            font-size: 0.85rem;
            cursor: pointer;
            opacity: 0.4;
            transition: all 0.2s;
            white-space: nowrap;
        "
    >
        <i class="bi bi-search" style="margin-right: 4px;"></i>Check
    </button>
</div>

@endsection
