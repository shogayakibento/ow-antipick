@extends('layouts.app') @section('title','プライバシーポリシー | OW2 アンチピックチェッカー')
@section('description','OW2 アンチピックチェッカーのプライバシーポリシーです。広告・Cookie・アクセス解析に関する情報をご確認ください。')
@section('content')
<div style="padding: 0 4px;">

    <div style="text-align: center; margin-bottom: 20px;">
        <h1 style="font-size: 1.3rem; font-weight: 700; color: #e8eaf6; margin-bottom: 4px;">
            <i class="bi bi-shield-check-fill" style="color: #4a9eff; margin-right: 8px;"></i>プライバシーポリシー
        </h1>
        <p style="font-size: 0.8rem; color: #3a4560;">最終更新日：{{ date('Y年m月d日') }}</p>
    </div>

    <div style="background: #1e2535; border: 1px solid #2a3348; border-radius: 12px; padding: 24px; line-height: 1.9; font-size: 0.9rem; color: #9aa5c4;">

        <section style="margin-bottom: 28px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                広告について
            </h2>
            <p>当サイトでは、第三者配信の広告サービス（Google AdSense）を利用しています。Google などの第三者広告配信事業者は、Cookie を使用して、ユーザーが当サイトや他のサイトに過去にアクセスした際の情報に基づいて広告を配信することがあります。</p>
            <p style="margin-top: 10px;">Google が広告 Cookie を使用することにより、ユーザーが Google や Google のパートナーのサイトにアクセスした際の情報に基づいて、Google がお客様に広告を表示できるようになります。</p>
            <p style="margin-top: 10px;">
                パーソナライズ広告の無効化については
                <a href="https://www.google.com/settings/ads" target="_blank" rel="noopener" style="color: #4a9eff;">Google の広告設定</a>
                からオプトアウトできます。また
                <a href="https://www.aboutads.info" target="_blank" rel="noopener" style="color: #4a9eff;">aboutads.info</a>
                にアクセスすることで、パーソナライズ広告に使用される第三者配信事業者の Cookie を無効にできます。
            </p>
        </section>

        <section style="margin-bottom: 28px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                Cookie について
            </h2>
            <p>Cookie とは、ウェブサイトがブラウザに保存する小さなデータファイルです。当サイトでは、広告配信の最適化を目的として Cookie を使用することがあります。ブラウザの設定により Cookie の受け取りを拒否することができますが、一部のサービスが正常に動作しない場合があります。</p>
        </section>

        <section style="margin-bottom: 28px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                個人情報の収集について
            </h2>
            <p>当サイトでは、ユーザー登録・ログイン機能はなく、氏名・メールアドレス等の個人情報を収集することはありません。サイト内でキャラクターを選択して送信する操作は、結果を表示するためにのみ使用され、サーバー上に保存されることはありません。</p>
        </section>

        <section style="margin-bottom: 28px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                免責事項
            </h2>
            <p>当サイトのコンテンツ・情報については、できる限り正確な情報を提供するよう努めていますが、正確性・安全性を保証するものではありません。当サイトに掲載された内容によって生じた損害等について、当サイト運営者はいかなる責任も負いません。</p>
            <p style="margin-top: 10px;">当サイトは Blizzard Entertainment とは無関係の非公式ファンサイトです。Overwatch および関連するすべてのコンテンツは Blizzard Entertainment の商標または著作物です。</p>
        </section>

        <section>
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                お問い合わせ
            </h2>
            <p>プライバシーポリシーに関するお問い合わせは、
                <a href="https://x.com/owstrategy" target="_blank" rel="noopener" style="color: #4a9eff;">X（Twitter）@owstrategy</a>
                までDMにてご連絡ください。
            </p>
        </section>

    </div>

</div>
@endsection
