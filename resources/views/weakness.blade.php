@extends('layouts.app')
@section('title', 'キャラ詳細 | OW アンチピックチェッカー')
@section('description', '自分が使うキャラを選ぶと、そのキャラに有利なキャラ（天敵）を一覧表示します。オーバーウォッチの対策に役立てよう。')
@section('content')
<div style="padding: 0 4px; padding-bottom: 80px;">

    {{-- ヘッダー --}}
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
        <h1 style="font-size: 1.4rem; font-weight: 800; color: #e8eaf6; margin-bottom: 8px;">キャラ詳細</h1>
        <p style="font-size: 0.88rem; color: #8892a4; margin: 0; max-width: 380px; margin: 0 auto;">
            キャラクターを選ぶと、<br>
            <strong style="color: #4a9eff;">カウンター</strong>と<strong style="color: #ef4444;">天敵</strong>を詳しく確認できます。
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

    <form method="POST" action="{{ route('weakness.result') }}" id="weakness-form">
        @csrf
        <input type="hidden" name="character" id="selected-weakness-char" value="">

        {{-- タンク --}}
        <div class="tank" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">🛡️ タンク</div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class="character-list">
                @foreach($characters as $character)
                    @if($character->role == 'タンク')
                        <div class="character-card weakness-card char-tank" data-name="{{ $character->name }}">
                            <img src="{{ $character->image_url }}" alt="{{ $character->name }}">
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- ダメージ --}}
        <div class="damage" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">⚔️ ダメージ</div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class="character-list">
                @foreach($characters as $character)
                    @if($character->role == 'ダメージ')
                        <div class="character-card weakness-card char-damage" data-name="{{ $character->name }}">
                            <img src="{{ $character->image_url }}" alt="{{ $character->name }}">
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- サポート --}}
        <div class="support" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">💚 サポート</div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class="character-list">
                @foreach($characters as $character)
                    @if($character->role == 'サポート')
                        <div class="character-card weakness-card char-support" data-name="{{ $character->name }}">
                            <img src="{{ $character->image_url }}" alt="{{ $character->name }}">
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div style="text-align: center; padding: 8px 0 16px;">
            <button id="weakness-submit" type="submit" disabled style="
                background: linear-gradient(135deg, #1d4ed8, #4a9eff);
                color: white; border: none; border-radius: 10px;
                padding: 12px 28px; font-weight: 700; font-size: 0.95rem;
                cursor: not-allowed; opacity: 0.4; transition: all 0.2s;
                box-shadow: 0 2px 12px rgba(74,158,255,0.15);
            ">
                <i class="bi bi-person-lines-fill" style="margin-right: 8px;"></i>詳細を見る
            </button>
        </div>
    </form>

</div>

{{-- スティッキーバー --}}
<div id="weakness-sticky" style="
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
    <div id="weakness-selected-slot" style="
        width: 44px; height: 44px;
        border-radius: 8px;
        border: 1px dashed #2a3348;
        background: #1e2535;
        display: flex; align-items: center; justify-content: center;
        overflow: hidden;
        color: #3a4560; font-size: 0.7rem;
    ">自分</div>

    <div style="font-size: 0.82rem; color: #8892a4;" id="weakness-sticky-label">キャラクターを1体選んでください</div>

    <button
        id="weakness-sticky-submit"
        type="submit"
        form="weakness-form"
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
        <i class="bi bi-person-lines-fill" style="margin-right: 4px;"></i>詳細を見る
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let selected = null;

    document.querySelectorAll('.weakness-card').forEach(function (card) {
        card.addEventListener('click', function () {
            document.querySelectorAll('.weakness-card').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            selected = card.dataset.name;
            document.getElementById('selected-weakness-char').value = selected;

            const img = card.querySelector('img');
            const slot = document.getElementById('weakness-selected-slot');
            slot.innerHTML = '<img src="' + img.src + '" style="width:100%;height:100%;object-fit:cover;">';

            document.getElementById('weakness-sticky-label').textContent = selected;
            const submitBtn = document.getElementById('weakness-submit');
            submitBtn.disabled = false;
            submitBtn.style.opacity = '1';
            submitBtn.style.cursor = 'pointer';
            submitBtn.style.boxShadow = '0 4px 16px rgba(74,158,255,0.35)';
            document.getElementById('weakness-sticky-submit').disabled = false;
            document.getElementById('weakness-sticky-submit').style.opacity = '1';
        });
    });
});
</script>

@endsection
