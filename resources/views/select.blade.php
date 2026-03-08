@extends('layouts.app') @section('title','キャラ・ロール選択 | OW2 アンチピックチェッカー')
@section('description','あなたのロールと敵チームのキャラクターを選択してください。最大5人まで選べます。オーバーウォッチ2のカウンターキャラをすぐに確認できます。')
@section('content')
<div style="padding: 0 4px; padding-bottom: 80px;">

    <!-- ロール選択 -->
    <div style="
        background: linear-gradient(135deg, #1e2535, #252d3d);
        border: 1px solid #2a3348;
        border-radius: 12px;
        padding: 20px 16px;
        margin-bottom: 20px;
        text-align: center;
    ">
        <h2 style="font-size: 1rem; color: #8892a4; font-weight: 600; margin-bottom: 14px; letter-spacing: 0.05em; text-transform: uppercase;">
            <i class="bi bi-person-fill" style="margin-right: 6px; color: #4a9eff;"></i>あなたのロールを選択
        </h2>
        <div class='user-role' style="padding: 0;">
            <button type="button" class="selectable-role tank" data-role="タンク">
                🛡️ タンク
            </button>
            <button type="button" class="selectable-role damage" data-role="ダメージ">
                ⚔️ ダメージ
            </button>
            <button type="button" class="selectable-role support" data-role="サポート">
                💚 サポート
            </button>
        </div>
        <p style="font-size: 0.75rem; color: #3a4560; margin-top: 10px; margin-bottom: 0;">
            ※ あなたが使用するロールを選んでください
        </p>
    </div>

    <!-- 敵キャラ選択説明 + 検索 -->
    <div style="margin-bottom: 12px;">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 4px;">
            <h2 style="font-size: 1rem; color: #8892a4; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; margin: 0;">
                <i class="bi bi-people-fill" style="margin-right: 6px; color: #ef4444;"></i>敵チームのキャラクターを選択
            </h2>
            <div style="position: relative;">
                <i class="bi bi-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #5a6278; font-size: 0.85rem;"></i>
                <input
                    type="text"
                    id="char-search"
                    placeholder="キャラ名で絞り込み..."
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
        <p style="font-size: 0.78rem; color: #3a4560; margin: 0;">最大5キャラまで選択できます</p>
    </div>

    <!-- フォームエラー -->
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
        <!-- タンク -->
        <div class="tank" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            🛡️ タンク
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'タンク')
                        <div class="character-card char-tank" data-name="{{ $character->name }}">
                            <img src="{{$character->image_url}}" alt="{{$character->name}}" />
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- ダメージ -->
        <div class="damage" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            ⚔️ ダメージ
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'ダメージ')
                        <div class="character-card char-damage" data-name="{{ $character->name }}">
                            <img src="{{$character->image_url}}" alt="{{$character->name}}">
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- サポート -->
        <div class="support" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            💚 サポート
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'サポート')
                        <div class="character-card char-support" data-name="{{ $character->name }}">
                            <img src="{{$character->image_url}}" alt="{{$character->name}}">
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <form method="POST" action="/choose" id="select-form">
        @csrf
        <input type="hidden" name="role" id="selected-role" value=''>
        <input type="hidden" name="character[]" id="selected-character" value=''>
        {{-- 通常の送信ボタン（スクロール位置に依存しないフォールバック） --}}
        <div style="text-align: center; padding: 8px 0 16px;">
            <button id='submit' type='submit'>
                <i class="bi bi-search" style="margin-right: 6px;"></i>最適アンチピックを表示
            </button>
        </div>
    </form>

</div>

<!-- スティッキーバー -->
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
    <!-- スロット -->
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

    <!-- カウント -->
    <div style="font-size: 0.8rem; color: #8892a4; white-space: nowrap; min-width: 48px; text-align: center;">
        <span id="sticky-count" style="color: #4a9eff; font-weight: 700; font-size: 1rem;">0</span>/5
    </div>

    <!-- 送信ボタン -->
    <button
        id="sticky-submit"
        onclick="$('#select-form').submit()"
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
        <i class="bi bi-search" style="margin-right: 4px;"></i>診断する
    </button>
</div>

@endsection
