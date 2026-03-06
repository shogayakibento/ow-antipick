@extends('layouts.app') @section('title','【オーバーウォッチ2】 アンチピックチェッカー')
@section('content')
<div style="
    text-align: center;
    padding: 60px 24px 48px;
    background: linear-gradient(160deg, #0d1117 0%, #161b27 40%, #1a2040 100%);
    border-radius: 12px;
    border: 1px solid #2a3348;
    position: relative;
    overflow: hidden;
">
    <!-- 背景装飾 -->
    <div style="
        position: absolute; top: -60px; right: -60px;
        width: 200px; height: 200px;
        background: radial-gradient(circle, rgba(74,158,255,0.08) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    "></div>
    <div style="
        position: absolute; bottom: -40px; left: -40px;
        width: 160px; height: 160px;
        background: radial-gradient(circle, rgba(236,72,153,0.06) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    "></div>

    <div style="position: relative; z-index: 1;">
        <div style="
            display: inline-block;
            background: rgba(74,158,255,0.12);
            border: 1px solid rgba(74,158,255,0.3);
            color: #4a9eff;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 4px 14px;
            border-radius: 20px;
            letter-spacing: 0.08em;
            margin-bottom: 18px;
        ">OVERWATCH 2 TOOL</div>

        <h1 class="main-title">
            アンチピックチェッカー
        </h1>

        <p style="font-size: 0.9rem; color: #5a6278; margin-bottom: 6px; font-weight: 600;">
            【オーバーウォッチ2】
        </p>

        <p class="lead" style="max-width: 480px; margin: 0 auto 28px;">
            敵チームのキャラクターを選択すると、<br>
            相性データをもとに<strong style="color: #4a9eff;">最適なカウンターキャラ</strong>を提案します。
        </p>

        <a href="{{ route('select') }}" class="start-btn">
            <i class="bi bi-play-fill" style="margin-right: 6px;"></i>診断を開始する
        </a>

        <div style="margin-top: 36px; display: flex; justify-content: center; gap: 24px; flex-wrap: wrap;">
            <div style="text-align: center; color: #5a6278; font-size: 0.8rem;">
                <div style="font-size: 1.5rem; margin-bottom: 4px;">🛡️</div>
                <div style="color: #4f8ef7; font-weight: 700; font-size: 1rem;">タンク</div>
                <div>全キャラ対応</div>
            </div>
            <div style="text-align: center; color: #5a6278; font-size: 0.8rem;">
                <div style="font-size: 1.5rem; margin-bottom: 4px;">⚔️</div>
                <div style="color: #ef4444; font-weight: 700; font-size: 1rem;">ダメージ</div>
                <div>全キャラ対応</div>
            </div>
            <div style="text-align: center; color: #5a6278; font-size: 0.8rem;">
                <div style="font-size: 1.5rem; margin-bottom: 4px;">💚</div>
                <div style="color: #ec4899; font-weight: 700; font-size: 1rem;">サポート</div>
                <div>全キャラ対応</div>
            </div>
        </div>
    </div>
</div>
@endsection
