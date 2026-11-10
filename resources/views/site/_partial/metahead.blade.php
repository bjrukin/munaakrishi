@php
    $general_setting = \App\Models\GeneralSetting::first();
    $company_title = $general_setting->company_name ?? 'Munaa Krishi Limited';
    $title = $page_title ?? ($general_setting->meta_title ?? 'Home · ' . $company_title);
    if (!str_contains($title, $company_title)) {
        $title = $title . ' · ' . $company_title;
    }
    $description = $meta_description ?? ($general_setting->meta_description ?? 'Munaa Krishi Limited is an agribusiness initiative jointly envisioned by NRNA and the Government of Nepal.');
@endphp
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<link rel="canonical" href="{{ URL::current() }}">
<link rel="icon" type="image/png" href="{{ asset('assets/images/brand/munaa-favicon.png') }}">
<meta name="theme-color" content="#075B32">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ URL::current() }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ asset('assets/images/brand/munaa-logo-enhanced.png') }}">
<meta property="og:site_name" content="{{ $company_title }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ URL::current() }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ asset('assets/images/brand/munaa-logo-enhanced.png') }}">