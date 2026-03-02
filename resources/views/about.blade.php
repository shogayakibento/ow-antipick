@extends('layouts.app') @section('title','このサイトについて')
@section('content')
<div class='py-3 px-3 mx-3 gray'>
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button
                class="accordion-button"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseOne"
                aria-expanded="true"
                aria-controls="collapseOne"
            >
                このサイトは何をするもの？
            </button>
        </h2>
        <div
            id="collapseOne"
            class="accordion-collapse collapse show"
            data-bs-parent="#accordionExample"
        >
            <div class="accordion-body">
                <strong>{{env('SITE_NAME')}}</strong>は、敵チームとのキャラクター相性をもとに、きつい相手への対策となるキャラクターを提案するツールです。
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseTwo"
                aria-expanded="false"
                aria-controls="collapseTwo"
            >
                どうやって結果を出してるの？
            </button>
        </h2>
        <div
            id="collapseTwo"
            class="accordion-collapse collapse"
            data-bs-parent="#accordionExample"
        >
            <div class="accordion-body">
                キャラクター同士の相性データをもとに、敵5人に対して<strong>有利を取れる数</strong>を計算し、スコア順にランキング形式で提示しています。
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapseThree"
                aria-expanded="false"
                aria-controls="collapseThree"
            >
                注意事項
            </button>
        </h2>
        <div
            id="collapseThree"
            class="accordion-collapse collapse"
            data-bs-parent="#accordionExample"
        >
            <div class="accordion-body">
                このサイトは <strong>Overwatchの非公式ファンサイト</strong>です。Blizzard Entertainmentとは一切関係ありません。
            </div>
        </div>
    </div>
</div>
</div>
@endsection
