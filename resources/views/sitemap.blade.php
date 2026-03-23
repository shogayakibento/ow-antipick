<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    <url>
        <loc>{{ url('/') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/') }}"/>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/en') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/') }}"/>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/select') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/select') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/select') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/select') }}"/>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/en/select') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/select') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/select') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/select') }}"/>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ url('/heroes') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/heroes') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/heroes') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/heroes') }}"/>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ url('/en/heroes') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/heroes') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/heroes') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/heroes') }}"/>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach($characters as $character)
    <url>
        <loc>{{ url('/heroes/' . $character->slug) }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/heroes/' . $character->slug) }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/heroes/' . $character->slug) }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/heroes/' . $character->slug) }}"/>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/en/heroes/' . $character->slug) }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/heroes/' . $character->slug) }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/heroes/' . $character->slug) }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/heroes/' . $character->slug) }}"/>
        <changefreq>weekly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
    <url>
        <loc>{{ url('/about') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/about') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/about') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/about') }}"/>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ url('/en/about') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/about') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/about') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/about') }}"/>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ url('/privacy') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/privacy') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/privacy') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/privacy') }}"/>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
    <url>
        <loc>{{ url('/en/privacy') }}</loc>
        <xhtml:link rel="alternate" hreflang="ja" href="{{ url('/privacy') }}"/>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/privacy') }}"/>
        <xhtml:link rel="alternate" hreflang="x-default" href="{{ url('/privacy') }}"/>
        <changefreq>yearly</changefreq>
        <priority>0.3</priority>
    </url>
</urlset>
