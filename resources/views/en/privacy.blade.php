@extends('layouts.app_en') @section('title','Privacy Policy | OW2 Anti-Pick Checker')
@section('description','Privacy Policy for OW2 Anti-Pick Checker. Information about advertising, cookies, and data collection.')
@section('content')
<div style="padding: 0 4px;">

    <div style="text-align: center; margin-bottom: 20px;">
        <h1 style="font-size: 1.3rem; font-weight: 700; color: #e8eaf6; margin-bottom: 4px;">
            <i class="bi bi-shield-check-fill" style="color: #4a9eff; margin-right: 8px;"></i>Privacy Policy
        </h1>
        <p style="font-size: 0.8rem; color: #3a4560;">Last updated: {{ date('F j, Y') }}</p>
    </div>

    <div style="background: #1e2535; border: 1px solid #2a3348; border-radius: 12px; padding: 24px; line-height: 1.9; font-size: 0.9rem; color: #9aa5c4;">

        <section style="margin-bottom: 28px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                Advertising
            </h2>
            <p>This site uses Google AdSense, a third-party advertising service. Google and other third-party vendors use cookies to serve ads based on a user's prior visits to this site and other sites on the Internet.</p>
            <p style="margin-top: 10px;">
                You may opt out of personalized advertising by visiting
                <a href="https://www.google.com/settings/ads" target="_blank" rel="noopener" style="color: #4a9eff;">Google's Ads Settings</a>.
                Alternatively, you can opt out of third-party vendor cookies by visiting
                <a href="https://www.aboutads.info" target="_blank" rel="noopener" style="color: #4a9eff;">aboutads.info</a>.
            </p>
        </section>

        <section style="margin-bottom: 28px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                Cookies
            </h2>
            <p>Cookies are small data files stored in your browser. This site may use cookies for the purpose of optimizing ad delivery. You can disable cookies in your browser settings, though some features of the site may not function properly as a result.</p>
        </section>

        <section style="margin-bottom: 28px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                Personal Information
            </h2>
            <p>This site does not require user registration or login, and does not collect personal information such as names or email addresses. Character selections submitted through the tool are used solely to display results and are not stored on the server.</p>
        </section>

        <section style="margin-bottom: 28px;">
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                Disclaimer
            </h2>
            <p>While we strive to provide accurate information, we make no warranties regarding the completeness or accuracy of the content on this site. The site operator accepts no liability for any damages arising from use of this site.</p>
            <p style="margin-top: 10px;">This site is an unofficial fan site unaffiliated with Blizzard Entertainment. Overwatch and all related content are trademarks or copyrights of Blizzard Entertainment.</p>
        </section>

        <section>
            <h2 style="font-size: 1rem; font-weight: 700; color: #e8eaf6; margin-bottom: 10px; padding-bottom: 6px; border-bottom: 1px solid #2a3348;">
                Contact
            </h2>
            <p>For inquiries regarding this privacy policy, please contact us via DM on
                <a href="https://x.com/owstrategy" target="_blank" rel="noopener" style="color: #4a9eff;">X (Twitter) @owstrategy</a>.
            </p>
        </section>

    </div>

</div>
@endsection
