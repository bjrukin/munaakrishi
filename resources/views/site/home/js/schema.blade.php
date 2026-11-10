@php
use App\Models\GeneralSetting;
use App\Models\SocialLink;

$general_setting = GeneralSetting::first();
$social_link = SocialLink::first();

$structuredData = [
    "@context" => "https://schema.org/",
    "@type" => "LocalBusiness",
    "name" => $general_setting->company_name,
    "description" => $general_setting->meta_description,
    "url" => env('APP_URL'),
    "logo" => asset('assets/images/logo.png'),
    "image" => $general_setting->full_og_image,
    "telephone" => "+977". $general_setting->phone,
    "address" => [
        "@type" => "PostalAddress",
        "streetAddress" => $general_setting->address,
        "addressLocality" => "Kathmandu",
        "postalCode" => "44600",
        "addressCountry" => "NP"
    ],
    "sameAs" => array_filter([
        env('APP_URL'),
        $social_link->facebook ?? null,
        $social_link->instagram ?? null,
        $social_link->linkedin ?? null,
        $social_link->youtube ?? null
    ])
];

$breadcrumbData = [
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Home",
            "item" => route('home')
        ]
    ]
];
@endphp
<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
{!! json_encode($breadcrumbData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>