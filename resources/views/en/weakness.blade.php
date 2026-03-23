@extends('layouts.app_en')
@section('title', 'Hero Details | OW Anti-Pick Checker')
@section('description', 'Select a hero to see counters and weaknesses in Overwatch. Plan your picks with detailed matchup info.')
@section('content')
<div style="padding: 0 4px; padding-bottom: 8px;">

    <div style="
        text-align: center;
        padding: 32px 20px 24px;
        background: linear-gradient(160deg, #0d1117 0%, #1a1525 100%);
        border-radius: 12px;
        border: 1px solid #2a3348;
        margin-bottom: 24px;
    ">
        <div style="
            display: inline-block;
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.3);
            color: #ef4444;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 14px;
            border-radius: 20px;
            letter-spacing: 0.08em;
            margin-bottom: 14px;
        ">HERO DETAILS</div>
        <h1 style="font-size: 1.4rem; font-weight: 800; color: #e8eaf6; margin-bottom: 8px;">Hero Details</h1>
        <p style="font-size: 0.88rem; color: #8892a4; margin: 0 auto; max-width: 380px;">
            Select a hero to view<br>
            <strong style="color: #4a9eff;">counters</strong> and <strong style="color: #ef4444;">weaknesses</strong> in detail.
        </p>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger" style="margin-bottom: 16px; border-radius: 8px;">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('en.weakness.result') }}" id="weakness-form-en">
        @csrf
        <input type="hidden" name="character" id="selected-weakness-char-en" value="">

        <div class="tank" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">🛡️ Tank</div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class="character-list">
                @foreach($characters as $character)
                    @if($character->role == 'タンク')
                        <div class="character-card weakness-card-en char-tank" data-name="{{ $character->name_en }}">
                            <img src="{{ $character->image_url }}" alt="{{ $character->name_en }}">
                            <p>{{ $character->name_en }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="damage" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">⚔️ Damage</div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class="character-list">
                @foreach($characters as $character)
                    @if($character->role == 'ダメージ')
                        <div class="character-card weakness-card-en char-damage" data-name="{{ $character->name_en }}">
                            <img src="{{ $character->image_url }}" alt="{{ $character->name_en }}">
                            <p>{{ $character->name_en }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="support" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">💚 Support</div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class="character-list">
                @foreach($characters as $character)
                    @if($character->role == 'サポート')
                        <div class="character-card weakness-card-en char-support" data-name="{{ $character->name_en }}">
                            <img src="{{ $character->image_url }}" alt="{{ $character->name_en }}">
                            <p>{{ $character->name_en }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div style="text-align: center; padding: 20px 0 0;">
            <button id="weakness-submit-en" type="submit" disabled style="
                background: linear-gradient(135deg, #1d4ed8, #4a9eff);
                color: white; border: none; border-radius: 10px;
                padding: 12px 28px; font-weight: 700; font-size: 0.95rem;
                cursor: not-allowed; opacity: 0.4; transition: all 0.2s;
                box-shadow: 0 2px 12px rgba(74,158,255,0.15);
            ">
                <i class="bi bi-person-lines-fill" style="margin-right: 8px;"></i>View Details
            </button>
        </div>
    </form>

</div>

<div id="weakness-sticky-en" style="
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
    <div id="weakness-selected-slot-en" style="
        width: 44px; height: 44px;
        border-radius: 8px;
        border: 1px dashed #2a3348;
        background: #1e2535;
        display: flex; align-items: center; justify-content: center;
        overflow: hidden;
        color: #3a4560; font-size: 0.65rem; text-align: center;
    ">Hero</div>

    <div style="font-size: 0.82rem; color: #8892a4;" id="weakness-sticky-label-en">Select 1 hero</div>

    <button
        id="weakness-sticky-submit-en"
        type="submit"
        form="weakness-form-en"
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
            box-shadow: 0 2px 10px rgba(74,158,255,0.15);
        "
    >
        <i class="bi bi-person-lines-fill" style="margin-right: 4px;"></i>View Details
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.weakness-card-en').forEach(function (card) {
        card.addEventListener('click', function () {
            document.querySelectorAll('.weakness-card-en').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            const name = card.dataset.name;
            document.getElementById('selected-weakness-char-en').value = name;

            const img = card.querySelector('img');
            const slot = document.getElementById('weakness-selected-slot-en');
            slot.innerHTML = '<img src="' + img.src + '" style="width:100%;height:100%;object-fit:cover;">';
            document.getElementById('weakness-sticky-label-en').textContent = name;

            ['weakness-submit-en', 'weakness-sticky-submit-en'].forEach(function(id) {
                const btn = document.getElementById(id);
                btn.disabled = false;
                btn.style.opacity = '1';
                btn.style.boxShadow = '0 4px 16px rgba(74,158,255,0.35)';
                btn.style.cursor = 'pointer';
            });
        });
    });
});
</script>

@endsection
