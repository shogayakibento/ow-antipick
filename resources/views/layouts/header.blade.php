<div class='d-flex align-items-center' style="padding: 10px 16px; gap: 0;">
    <div class='d-flex align-items-center justify-content-center' style="padding: 6px 12px 6px 0; border-right: 1px solid #2a3348; margin-right: 14px;">
        <i id='menu-list' class='bi bi-list' style="font-size: 26px; color: #8892a4; cursor: pointer; transition: color 0.2s;"></i>
    </div>
    <div>
        <a href='{{route("index")}}' style="display: flex; align-items: center; text-decoration: none; gap: 10px;">
            <img id='logo' src='{{asset("imgs/logo.png")}}' alt="OW2 アンチピックチェッカー" style="max-height: 36px;" />
        </a>
    </div>
    <div class="ms-auto d-flex align-items-center gap-3" style="font-size: 0.82rem;">
        <a href='{{route("index")}}' style="color: #8892a4; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#4a9eff'" onmouseout="this.style.color='#8892a4'">トップ</a>
        <a href='{{route("about")}}' style="color: #8892a4; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#4a9eff'" onmouseout="this.style.color='#8892a4'">サイトについて</a>
    </div>
</div>
