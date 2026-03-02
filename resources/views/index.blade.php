@extends('layouts.app') @section('title','【オーバーウォッチ2】 アンチピックチェッカー')
@section('content')
<div class="bg-white p-4 text-center">

    <h1 class="main-title">【オーバーウォッチ2】 アンチピックチェッカー</h1>

    <p class="lead mt-3">
        敵チームのキャラクターから、あなたが選ぶべき最適なキャラを提案します。
    </p>

    <a href="{{ route('select') }}" class="start-btn">
        診断を開始する
    </a>

</div>
@endsection
