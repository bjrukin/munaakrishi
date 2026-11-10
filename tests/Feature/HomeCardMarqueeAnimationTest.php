<?php

namespace Tests\Feature;

use Illuminate\Support\Collection;
use Tests\TestCase;

class HomeCardMarqueeAnimationTest extends TestCase
{
    public function test_products_and_farms_render_seamless_marquee_tracks(): void
    {
        $products = view('site.home.sections.products', [
            'settings' => [],
            'featured_products' => new Collection(),
        ])->render();
        $farms = view('site.home.sections.farms', [
            'settings' => [],
            'partner_farms' => new Collection(),
        ])->render();
        $news = view('site.home.sections.news', [
            'settings' => [],
            'latest_notices' => new Collection(),
        ])->render();

        $this->assertStringContainsString('data-card-marquee', $products);
        $this->assertStringContainsString('data-card-marquee', $farms);
        $this->assertStringNotContainsString('data-card-marquee', $news);
        $this->assertSame(2, substr_count($products, 'card-marquee-set'));
        $this->assertSame(2, substr_count($farms, 'card-marquee-set'));
        $this->assertStringContainsString('aria-hidden="true"', $products);
        $this->assertStringContainsString('aria-hidden="true"', $farms);

        $stylesheet = file_get_contents(public_path('assets/css/style.css'));
        $this->assertStringContainsString('@keyframes cardMarquee', $stylesheet);
        $this->assertStringContainsString('@keyframes productCardMarquee', $stylesheet);
        $this->assertStringContainsString('.product-card-marquee .card-marquee-track', $stylesheet);
        $this->assertStringContainsString('prefers-reduced-motion: reduce', $stylesheet);
    }
}
