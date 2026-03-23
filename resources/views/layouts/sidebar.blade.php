<div id='overlay'></div>
<div id='sidebar_inside'>
    <div class='sidebar-logo'>
        <a href='{{route("index")}}'>
            <img src='{{asset("imgs/logo.png")}}'/>
        </a>
    </div>
    <ul class='sidebar-nav'>
        <li>
            <a href='{{route("index")}}'>トップページ</a>
        </li>
        <li>
            <a href='{{route("about")}}'>このサイトについて</a>
        </li>
        <li>
            <a href='{{route("privacy")}}'>プライバシーポリシー</a>
        </li>
        <li style="border-top: 1px solid #2a3348; margin-top: 8px; padding-top: 8px;">
            <a href='{{route("en.index")}}' style="color: #5a6278;">🇺🇸 English</a>
        </li>
    </ul>
</div>