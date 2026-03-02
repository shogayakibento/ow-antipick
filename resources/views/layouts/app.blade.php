<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='icon' type='image/x-icon' href='{{asset("imgs/favicon.ico")}}'/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"><link href="{{asset('css/app.css')}}" rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    </head>
    <body class='container gray-middle-light'>
        <div id='header' class='bg-white'>
            @include('layouts.header')
        </div>

        <div class='py-4 gray-light'>
            @yield('content')
        </div>
        
        <div id='footer' class='text-center py-2'>
            @include('layouts.footer')
        </div>
        <div id='sidebar'>
            @include('layouts.sidebar')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="{{asset('js/select.js')}}"></script>

        <!-- Amazon 左広告 -->
<a href="https://amzn.to/489qEQp"
   target="_blank" rel="noopener noreferrer"
   id="amazon-left">
    <div style="background:white; padding:8px; border-radius:6px; text-align:center; width:270px; box-shadow:0 0 8px rgba(0,0,0,0.15);">
        
        <img src="https://m.media-amazon.com/images/I/61wSOwpxaQL._AC_SY450_.jpg" style="width:250px;">

        <div style="margin-top:8px; font-size:14px; font-weight:bold;">
            Logicoolの最高傑作！
        </div>
        <div style="font-size:13px; font-weight:bold; color:#f39c12;">
            ラピッドトリガーキーボード🔥
        </div>
        <div style="margin-top:4px; font-size:13px; color:#333;">
            Logicool G ラピッドトリガー G515 RAPID TKL
        </div>
    </div>
</a>


<!-- Amazon 右広告 -->
<a href="https://amzn.to/4pEfPM4"
   target="_blank" rel="noopener noreferrer"
   id="amazon-right">
    <div style="background:white; padding:8px; border-radius:6px; text-align:center; width:270px; box-shadow:0 0 8px rgba(0,0,0,0.15);">
        
        <img src="https://m.media-amazon.com/images/I/51aHtlvwrGL._AC_SY450_.jpg" style="width:250px;">

        <div style="margin-top:8px; font-size:14px; font-weight:bold;">
            OWプロ（Properなど）も愛用！
        </div>

        <div style="margin-top:4px; font-size:13px; color:#333;">
            Logicool G PRO X SUPERLIGHT 2
        </div>

    </div>
</a>

<!-- PC/スマホ共通：ページ最下部に表示するモニター広告 -->
<a href="https://amzn.to/48lWiJ9"
   target="_blank" rel="noopener noreferrer"
   id="amazon-monitor">
    <div style="background:white; padding:10px; border-radius:8px; text-align:center; width:270px; box-shadow:0 0 10px rgba(0,0,0,0.15); margin: 30px auto;">
        
        <img src="https://m.media-amazon.com/images/I/71N6uQzNz8L._AC_SY450_.jpg" style="width:250px; border-radius:6px;">

        <div style="margin-top:10px; font-size:14px; font-weight:bold;">
            大人気メーカーの220Hz
        </div>
        <div style="font-size:13px; font-weight:bold; color:#f39c12;">
            コスパ最高のモニター🔥
        </div>

        <div style="margin-top:6px; font-size:13px; color:#333;">
            BenQ MOBIUZ EX251
        </div>

    </div>
</a>

<style>
#amazon-left {
    position: fixed;
    top: 400px;
    left: 20px;     /* ← ここを調整すると位置が変わる */
    z-index: 3000;
}

#amazon-right {
    position: fixed;
    top: 400px;
    right: 20px;    /* ← ここを調整すると位置が変わる */
    z-index: 3000;
}
</style>
<style>
@media (max-width: 768px) {
    /* キーボード（左）だけ非表示 */
    #amazon-left {
        display: none !important;
    }

    /* マウス（右）は下に中央寄せで表示 */
    #amazon-right {
        position: static !important;
        display: block !important;
        margin: 20px auto !important;
        width: fit-content !important;
    }

    /* モニター広告もスマホで表示（中央） */
    #amazon-monitor {
        position: static !important;
        display: block !important;
        margin: 20px auto !important;
        width: fit-content !important;
    }
}
</style>

    </body>
</html>