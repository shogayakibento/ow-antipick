<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='icon' type='image/x-icon' href='{{asset("imgs/favicon.ico")}}'/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600;700;800&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="{{asset('css/app.css')}}" rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </head>
    <body class='container' style="background-color: #0d1117; padding: 0; max-width: 100%;">
        <div style="max-width: 960px; margin: 0 auto; padding: 0 12px;">

            <div id='header' style="background-color: #080c14; border-bottom: 1px solid #2a3348;">
                @include('layouts.header')
            </div>

            <div style="background-color: #161b27; min-height: 60vh; padding: 24px 0;">
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

        <!-- Amazon 左広告 -->
        <a href="https://amzn.to/489qEQp" target="_blank" rel="noopener noreferrer" id="amazon-left">
            <div style="background:#1e2535; padding:8px; border-radius:8px; text-align:center; width:200px; box-shadow:0 4px 16px rgba(0,0,0,0.5); border: 1px solid #2a3348;">
                <img src="https://m.media-amazon.com/images/I/61wSOwpxaQL._AC_SY450_.jpg" style="width:184px; border-radius:4px;">
                <div style="margin-top:8px; font-size:12px; font-weight:bold; color:#e8eaf6;">
                    Logicoolの最高傑作！
                </div>
                <div style="font-size:11px; font-weight:bold; color:#f5c518;">
                    ラピッドトリガーキーボード🔥
                </div>
                <div style="margin-top:4px; font-size:11px; color:#8892a4;">
                    Logicool G515 RAPID TKL
                </div>
            </div>
        </a>

        <!-- Amazon 右広告 -->
        <a href="https://amzn.to/4pEfPM4" target="_blank" rel="noopener noreferrer" id="amazon-right">
            <div style="background:#1e2535; padding:8px; border-radius:8px; text-align:center; width:200px; box-shadow:0 4px 16px rgba(0,0,0,0.5); border: 1px solid #2a3348;">
                <img src="https://m.media-amazon.com/images/I/51aHtlvwrGL._AC_SY450_.jpg" style="width:184px; border-radius:4px;">
                <div style="margin-top:8px; font-size:12px; font-weight:bold; color:#e8eaf6;">
                    OWプロも愛用！
                </div>
                <div style="margin-top:4px; font-size:11px; color:#8892a4;">
                    G PRO X SUPERLIGHT 2
                </div>
            </div>
        </a>

        <!-- PC/スマホ共通：ページ最下部に表示するモニター広告 -->
        <a href="https://amzn.to/48lWiJ9" target="_blank" rel="noopener noreferrer" id="amazon-monitor">
            <div style="background:#1e2535; padding:10px; border-radius:8px; text-align:center; width:200px; box-shadow:0 4px 16px rgba(0,0,0,0.5); border: 1px solid #2a3348; margin: 30px auto;">
                <img src="https://m.media-amazon.com/images/I/71N6uQzNz8L._AC_SY450_.jpg" style="width:184px; border-radius:6px;">
                <div style="margin-top:10px; font-size:12px; font-weight:bold; color:#e8eaf6;">
                    大人気メーカーの220Hz
                </div>
                <div style="font-size:11px; font-weight:bold; color:#f5c518;">
                    コスパ最高のモニター🔥
                </div>
                <div style="margin-top:6px; font-size:11px; color:#8892a4;">
                    BenQ MOBIUZ EX251
                </div>
            </div>
        </a>

    </body>
</html>
