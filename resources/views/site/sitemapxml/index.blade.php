<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>https://{{ env('APP_WEBSITE') }}/</loc>
        <lastmod>2025-09-19T14:46:00+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    @if($categories->isNotEmpty())
    @foreach ($categories as $category)
    <url>
        <loc>{{route('category.detail', [ $category->slug])}}</loc>
        <lastmod>{{ $category->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <priority>0.80</priority>
    </url>
    @endforeach
    @endif
    @if($offers->isNotEmpty())
    @foreach ($offers as $offer)
    <url>
        <loc>{{route('offer.detail', [ $offer->slug])}}</loc>
        <lastmod>{{ $offer->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <priority>0.80</priority>
    </url>
    @endforeach
    @endif
    @if($products->isNotEmpty())
    @foreach ($products as $product)
    <url>
        <loc>{{route('product.detail', [ $product->slug])}}</loc>
        <lastmod>{{ $product->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <priority>0.80</priority>
    </url>
    @endforeach
    @endif
    <url>
        <loc>https://{{ env('APP_WEBSITE') }}/cart</loc>
        <lastmod>2025-09-19T14:46:00+00:00</lastmod>
        <priority>0.64</priority>
    </url>

    <url>
        <loc>https://{{ env('APP_WEBSITE') }}/about-us</loc>
        <lastmod>2025-09-19T14:46:00+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://{{ env('APP_WEBSITE') }}/contact-us</loc>
        <lastmod>2025-09-19T14:46:00+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://{{ env('APP_WEBSITE') }}/faq</loc>
        <lastmod>2025-09-19T14:46:00+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://{{ env('APP_WEBSITE') }}/terms-conditions</loc>
        <lastmod>2025-09-19T14:46:00+00:00</lastmod>
        <priority>0.64</priority>
    </url>
    <url>
        <loc>https://{{ env('APP_WEBSITE') }}/return-exchange</loc>
        <lastmod>2025-09-19T14:46:00+00:00</lastmod>
        <priority>0.64</priority>
    </url>
</urlset>