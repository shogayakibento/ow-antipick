@extends('layouts.app_en') @section('title','About | OW2 Anti-Pick Checker')
@section('description','OW2 Anti-Pick Checker is an unofficial fan tool that suggests optimal counter picks against the enemy team in Overwatch 2.')
@section('content')
<div style="padding: 0 4px;">

    <div style="text-align: center; margin-bottom: 20px;">
        <h1 style="font-size: 1.3rem; font-weight: 700; color: #e8eaf6; margin-bottom: 4px;">
            <i class="bi bi-info-circle-fill" style="color: #4a9eff; margin-right: 8px;"></i>About This Site
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
                    What does this site do?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionAbout">
                <div class="accordion-body" style="font-size: 0.9rem; line-height: 1.8;">
                    <strong style="color: #4a9eff;">{{env('SITE_NAME')}}</strong> is a tool that suggests counter heroes based on character matchup data against the enemy team.<br>
                    Select up to 5 enemy heroes to get a ranked list of counter picks based on matchup scores.
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
                    How to use
                </button>
            </h2>
            <div id="collapseUsage" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
                <div class="accordion-body" style="font-size: 0.9rem; line-height: 1.8;">
                    <ol style="padding-left: 1.2em; margin: 0;">
                        <li style="margin-bottom: 8px;"><strong style="color: #4ade80;">Choose your role</strong> — Select the role you want to play (Tank, Damage, or Support).</li>
                        <li style="margin-bottom: 8px;"><strong style="color: #4ade80;">Pick enemy heroes</strong> — Select up to 5 heroes from the enemy team.</li>
                        <li><strong style="color: #4ade80;">See the results</strong> — Press "Check" to get counter heroes ranked by matchup score. Tap each hero card to see why they counter the enemy.</li>
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
                    How are results calculated?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
                <div class="accordion-body" style="font-size: 0.9rem; line-height: 1.8;">
                    Each hero's skills and abilities are analyzed with AI to logically evaluate matchup compatibility, creating the matchup data.<br>
                    Based on that data, scores against all selected enemy heroes are summed to produce the ranking. There are two matchup tiers: <strong style="color: #ef4444;">Hard Counter</strong> (clearly advantageous) and <strong style="color: #f59e0b;">Favorable</strong> (slightly advantageous), each contributing different score values. Heroes with equal scores share the same rank.
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
                    Disclaimer
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionAbout">
                <div class="accordion-body" style="font-size: 0.9rem; line-height: 1.8;">
                    This site is an <strong style="color: #f97316;">unofficial fan site</strong> unaffiliated with Blizzard Entertainment.<br>
                    Matchup data is reviewed and updated regularly as patches and the meta evolve.
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
