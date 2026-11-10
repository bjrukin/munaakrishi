@php 
$general_setting = \App\Models\GeneralSetting::first();
@endphp

<title>{{ $row->meta_title }}</title>
<meta name="description" content="{{ $row->meta_description }}">
<link rel="canonical" href="{{ URL::current() }}">
<!-- Open Graph -->
<meta property="og:title" content="{{ $row->meta_title }}" />
<meta property="og:description" content="{{ $row->meta_description }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta property="og:image" content="{{ $general_setting->full_og_image }}" />
<meta property="og:site_name" content="{{env('APP_NAME')}}" />
<meta property="og:locale" content="en_US" />
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $row->meta_title }}" />
<meta name="twitter:description" content="{{ $row->meta_description }}" />
<meta name="twitter:image" content="{{ $general_setting->full_og_image }}" />