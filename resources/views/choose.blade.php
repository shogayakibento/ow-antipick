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
                @php $charReasons = $reasons[$character->id] ?? []; @endphp
                <div class="chosen-character-card">
                    <img src="{{ $character->image_url }}" alt="{{ $character->name }}" />
                    <p>{{ $character->name }}</p>
                    @if(count($charReasons) > 0)
                        <button
                            type="button"
                            class="reason-toggle-btn"
                            onclick="toggleReason(this)"
                            aria-expanded="false"
                        >理由を見る <i class="bi bi-chevron-down"></i></button>
                        <div class="reason-panel" hidden>
                            <ul class="reason-list">
                                @foreach($charReasons as $r)
                                    <li class="reason-item {{ $r['score'] >= 2 ? 'strong-counter' : 'counter' }}">
                                        <span class="counter-icon">{{ $r['score'] >= 2 ? '⚡' : '✓' }}</span>
                                        <span class="reason-opponent">vs {{ $r['opponent'] }}</span>
                                        <span class="reason-text">{{ $r['reason'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endforeach
</div>
    <a href="{{ route('select') }}" class="return">ロールとキャラクターを選びなおす</a>
</div>

<script>
function toggleReason(btn) {
    const panel = btn.nextElementSibling;
    const expanded = btn.getAttribute('aria-expanded') === 'true';
    btn.setAttribute('aria-expanded', !expanded);
    if (expanded) {
        panel.hidden = true;
        btn.innerHTML = '理由を見る <i class="bi bi-chevron-down"></i>';
    } else {
        panel.hidden = false;
        btn.innerHTML = '閉じる <i class="bi bi-chevron-up"></i>';
    }
}
</script>
@endsection