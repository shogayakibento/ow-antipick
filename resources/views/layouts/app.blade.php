<html lang="ja">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('description', 'オーバーウォッチの敵チームを選択するだけで、相性データをもとに最適なカウンターキャラを提案するツールです。')">
        <link rel="canonical" href="{{ url()->current() }}">
        <!-- hreflang -->
        @php
            $currentPath = request()->path();
            $enUrl = url('/en' . ($currentPath ? '/' . $currentPath : ''));
        @endphp
        <link rel="alternate" hreflang="ja" href="{{ url()->current() }}">
        <link rel="alternate" hreflang="en" href="{{ $enUrl }}">
        <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">
        <!-- OGP -->
        <meta property="og:title" content="@yield('title', 'OW アンチピックチェッカー')">
        <meta property="og:description" content="@yield('description', '敵チームのキャラを選ぶだけで最適なカウンターキャラを提案！オーバーウォッチのランク・カジュアル対戦で活用できます。')">
        <meta property="og:site_name" content="OW アンチピックチェッカー">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{asset('imgs/logo.png')}}">
        <meta property="og:locale" content="ja_JP">
        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="@yield('title', 'OW アンチピックチェッカー')">
        <meta name="twitter:description" content="@yield('description', '敵チームのキャラを選ぶだけで最適なカウンターキャラを提案！OWの対戦に役立てよう。')">
        <meta name="twitter:image" content="{{asset('imgs/logo.png')}}">
        @yield('jsonld')
        <link rel='icon' type='image/x-icon' href='{{asset("imgs/favicon.ico")}}'/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600;700;800&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="{{asset('css/app.css')}}" rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Google AdSense -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1019568110946113" crossorigin="anonymous"></script>
    </head>
    <body class='container' style="background-color: #0d1117; padding: 0; max-width: 100%;">
        <div style="max-width: 960px; margin: 0 auto; padding: 0 12px;">

            <div id='header' style="background-color: #080c14; border-bottom: 1px solid #2a3348;">
                @include('layouts.header')
            </div>

            <div style="background-color: #161b27; padding: 24px 0 0;">
                @yield('content')
            </div>

            <div id='footer'>
                @include('layouts.footer')
            </div>

        </div>
        <div id='sidebar'>
            @include('layouts.sidebar')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="{{asset('js/select.js')}}"></script>

    </body>
</html>
