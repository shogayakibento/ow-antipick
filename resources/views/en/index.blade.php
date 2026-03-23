@extends('layouts.app_en') @section('title','[Overwatch] Anti-Pick Checker')
@section('description','Select up to 5 enemy heroes in Overwatch and get the best counter picks ranked by matchup data. Free tool.')
@section('jsonld')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebApplication",
  "name": "OW Anti-Pick Checker",
  "description": "Select up to 5 enemy heroes in Overwatch and get the best counter picks ranked by matchup data.",
  "url": "{{ url('/en') }}",
  "applicationCategory": "GameApplication",
  "operatingSystem": "All",
  "inLanguage": "en"
}
</script>
@endsection
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
    <!-- background decoration -->
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
        ">OVERWATCH TOOL</div>

        <h1 class="main-title">
            Anti-Pick Checker
        </h1>

        <p style="font-size: 0.9rem; color: #5a6278; margin-bottom: 6px; font-weight: 600;">
            [Overwatch]
        </p>

        <p class="lead" style="max-width: 480px; margin: 0 auto 28px;">
            Select the enemy team's heroes and get<br>
            <strong style="color: #4a9eff;">optimal counter picks</strong> based on matchup data.
        </p>

        <a href="{{ route('en.select') }}" class="start-btn">
            <i class="bi bi-play-fill" style="margin-right: 6px;"></i>Start
        </a>

        <div style="margin-top: 36px; display: flex; flex-direction: column; align-items: center; gap: 10px; width: 100%; max-width: 320px; margin-left: auto; margin-right: auto; margin-top: 36px;">
            <div style="font-size: 0.72rem; color: #3a4560; letter-spacing: 0.1em; font-weight: 700; text-transform: uppercase; margin-bottom: 2px;">HOW TO USE</div>
            <div style="display: flex; align-items: flex-start; gap: 12px; text-align: left; width: 100%;">
                <div style="width: 22px; height: 22px; border-radius: 50%; background: rgba(74,158,255,0.15); border: 1px solid rgba(74,158,255,0.4); color: #4a9eff; font-size: 0.72rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 2px;">1</div>
                <div>
                    <div style="color: #c8d0e0; font-size: 0.85rem; font-weight: 600;">🛡️ ⚔️ 💚 Choose your role</div>
                    <div style="color: #5a6278; font-size: 0.77rem;">Select the role you want to play</div>
                </div>
            </div>
            <div style="display: flex; align-items: flex-start; gap: 12px; text-align: left; width: 100%;">
                <div style="width: 22px; height: 22px; border-radius: 50%; background: rgba(74,158,255,0.15); border: 1px solid rgba(74,158,255,0.4); color: #4a9eff; font-size: 0.72rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 2px;">2</div>
                <div>
                    <div style="color: #c8d0e0; font-size: 0.85rem; font-weight: 600;">Pick enemy heroes</div>
                    <div style="color: #5a6278; font-size: 0.77rem;">Select up to 5 heroes</div>
                </div>
            </div>
            <div style="display: flex; align-items: flex-start; gap: 12px; text-align: left; width: 100%;">
                <div style="width: 22px; height: 22px; border-radius: 50%; background: rgba(74,158,255,0.15); border: 1px solid rgba(74,158,255,0.4); color: #4a9eff; font-size: 0.72rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 2px;">3</div>
                <div>
                    <div style="color: #c8d0e0; font-size: 0.85rem; font-weight: 600;">See counter picks</div>
                    <div style="color: #5a6278; font-size: 0.77rem;">Best heroes ranked by matchup score</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
