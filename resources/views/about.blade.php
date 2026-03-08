@extends('layouts.app') @section('title','このサイトについて | OW2 アンチピックチェッカー')
@section('description','OW2 アンチピックチェッカーは、オーバーウォッチ2の敵チームに対して最適なカウンターキャラを提案する非公式ファンツールです。')
@section('content')
<div style="padding: 0 4px;">

    <div style="text-align: center; margin-bottom: 20px;">
        <h1 style="font-size: 1.3rem; font-weight: 700; color: #e8eaf6; margin-bottom: 4px;">
            <i class="bi bi-info-circle-fill" style="color: #4a9eff; margin-right: 8px;"></i>このサイトについて
        </h1>
        <p style="font-size: 0.8rem; color: #3a4560;">{{env('SITE_NAME')}}</p>
    </div>

    <div class="accordion" id="accordionAbout" style="border-radius: 12px; overflow: hidden; border: 1px solid #2a3348;">
        <div class="accordion-item" style="border: none; border-bottom: 1px solid #2a3348;">
            <h2 class="accordion-header">
                <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                    style="font-size: 0.95rem; font-weight: 600;"
                >
                    <i class="bi bi-question-circle-fill" style="margin-right: 10px; color: #4a9eff;"></i>
                    このサイトは何をするもの？
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionAbout">
                <div class="accordion-body" style="font-size: 0.9rem; line-height: 1.8;">
                    <strong style="color: #4a9eff;">{{env('SITE_NAME')}}</strong>は、敵チームとのキャラクター相性をもとに、苦手な相手への対策となるキャラクターを提案するツールです。<br>
                    敵チームのキャラを最大5人選択することで、相性データに基づいたカウンターキャラをランキング形式で表示します。
                </div>
            </div>
        </div>

        <div class="accordion-item" style="border: none; border-bottom: 1px solid #2a3348;">
            <h2 class="accordion-header">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseUsage"
                    aria-expanded="false"
                    aria-controls="collapseUsage"
                    style="font-size: 0.95rem; font-weight: 600;"
                >
                    <i class="bi bi-list-ol" style="margin-right: 10px; color: #4ade80;"></i>
                    使い方
                </button>
            </h2>
            <div id="collapseUsage" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
                <div class="accordion-body" style="font-size: 0.9rem; line-height: 1.8;">
                    <ol style="padding-left: 1.2em; margin: 0;">
                        <li style="margin-bottom: 8px;"><strong style="color: #4ade80;">ロールを選ぶ</strong> ― 自分が使いたいロール（タンク・ダメージ・サポート）を選択します。</li>
                        <li style="margin-bottom: 8px;"><strong style="color: #4ade80;">敵チームを選ぶ</strong> ― 相手チームのキャラクターを最大5人まで選択します。</li>
                        <li><strong style="color: #4ade80;">結果を確認する</strong> ― 「診断する」を押すと、相性スコアの高い順にカウンターキャラがランキング表示されます。各キャラのカードをタップすると、有利な理由も確認できます。</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="accordion-item" style="border: none; border-bottom: 1px solid #2a3348;">
            <h2 class="accordion-header">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                    style="font-size: 0.95rem; font-weight: 600;"
                >
                    <i class="bi bi-bar-chart-fill" style="margin-right: 10px; color: #f5c518;"></i>
                    どうやって結果を出してるの？
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
                <div class="accordion-body" style="font-size: 0.9rem; line-height: 1.8;">
                    各キャラクターのスキル・アビリティ構成をAIで分析し、能力の相性を論理的に評価して相性データを作成しています。<br>
                    そのデータをもとに、選んだ敵キャラ全員に対するスコアを合算してランキングを作成しています。相性には2段階あり、<strong style="color: #ef4444;">強カウンター</strong>（明確に有利）と<strong style="color: #f59e0b;">有利</strong>（やや優位）でスコアが異なります。スコアが同じキャラは同じ順位に表示されます。
                </div>
            </div>
        </div>

        <div class="accordion-item" style="border: none;">
            <h2 class="accordion-header">
                <button
                    class="accordion-button collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                    style="font-size: 0.95rem; font-weight: 600;"
                >
                    <i class="bi bi-exclamation-triangle-fill" style="margin-right: 10px; color: #f97316;"></i>
                    注意事項
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
                <div class="accordion-body" style="font-size: 0.9rem; line-height: 1.8;">
                    このサイトは <strong style="color: #f97316;">Overwatchの非公式ファンサイト</strong>です。Blizzard Entertainmentとは一切関係ありません。<br>
                    キャラクターの相性データは管理者による独自の評価に基づいており、公式データではありません。また、パッチやメタの変化により、実際の環境と異なる場合があります。
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
