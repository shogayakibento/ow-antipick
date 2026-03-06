@extends('layouts.app') @section('title','キャラ、ロール選択')
@section('content')
<div style="padding: 0 4px;">

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
            <button type="button" class="selectable-role tank">
                <i class="bi bi-shield-fill" style="margin-right: 4px;"></i>タンク
            </button>
            <button type="button" class="selectable-role damage">
                <i class="bi bi-heart-arrow" style="margin-right: 4px;"></i>ダメージ
            </button>
            <button type="button" class="selectable-role support">
                <i class="bi bi-heart-fill" style="margin-right: 4px;"></i>サポート
            </button>
        </div>
        <p style="font-size: 0.75rem; color: #3a4560; margin-top: 10px; margin-bottom: 0;">
            ※ あなたが使用するロールを選んでください
        </p>
    </div>

    <!-- 敵キャラ選択説明 -->
    <div style="text-align: center; margin-bottom: 12px;">
        <h2 style="font-size: 1rem; color: #8892a4; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            <i class="bi bi-people-fill" style="margin-right: 6px; color: #ef4444;"></i>敵チームのキャラクターを選択
        </h2>
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
            <i class="bi bi-shield-fill"></i> タンク
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'タンク')
                        <div class="character-card">
                            <img src="{{$character->image_url}}" alt="{{$character->name}}" />
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- ダメージ -->
        <div class="damage" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            <i class="bi bi-heart-arrow"></i> ダメージ
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'ダメージ')
                        <div class="character-card">
                            <img src="{{$character->image_url}}" alt="{{$character->name}}">
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- サポート -->
        <div class="support" style="border-radius: 8px 8px 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.9rem;">
            <i class="bi bi-heart-fill"></i> サポート
        </div>
        <div style="background: #1e2535; border: 1px solid #2a3348; border-top: none; border-radius: 0 0 8px 8px; margin-bottom: 16px;">
            <div class='character-list'>
                @foreach($characters as $character)
                    @if($character->role == 'サポート')
                        <div class="character-card">
                            <img src="{{$character->image_url}}" alt="{{$character->name}}">
                            <p>{{ $character->name }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <form method="POST" action="/choose">
        @csrf
        <input type="hidden" name="role" id="selected-role" value=''>
        <input type="hidden" name="character[]" id="selected-character" value=''>
        <div style="text-align: center; padding: 8px 0 16px;">
            <button id='submit' type='submit'>
                <i class="bi bi-search" style="margin-right: 6px;"></i>最適アンチピックを表示
            </button>
        </div>
    </form>

</div>
@endsection
