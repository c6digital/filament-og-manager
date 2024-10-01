@props([
    'for' => null,
])

@php
    $meta = $for?->socialMeta ?? \C6Digital\OgManager\Models\Meta::whereNull('metable_type')->first();
@endphp

@if($meta)
    <!-- Primary Meta Tags -->
    <title>{{ $meta->title }}</title>
    <meta name="title" content="{{ $meta->title }}" />
    <meta name="description" content="{{ $meta->description }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://metatags.io/" />
    <meta property="og:title" content="{{ $meta->title }}" />
    <meta property="og:description" content="{{ $meta->description }}" />
    <meta property="og:image" content="{{ $meta->getImageUrl() }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://metatags.io/" />
    <meta property="twitter:title" content="{{ $meta->title }}" />
    <meta property="twitter:description" content="{{ $meta->description }}" />
    <meta property="twitter:image" content="{{ $meta->getImageUrl() }}" />
@endif
