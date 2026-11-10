<?php

namespace Tests\Feature;

use Tests\TestCase;

class ImageLoadingStrategyTest extends TestCase
{
    public function test_homepage_keeps_primary_media_eager_and_defers_section_media(): void
    {
        $hero = $this->view('site.home.sections.hero', [
            'settings' => [],
            'banners' => collect(),
        ]);
        $section = $this->view('site.home.sections.who_we_are', ['settings' => []]);

        $hero->assertSee('loading="eager"', false);
        $hero->assertSee('fetchpriority="high"', false);
        $section->assertSee('loading="lazy"', false);
        $section->assertSee('decoding="async"', false);
    }
}
