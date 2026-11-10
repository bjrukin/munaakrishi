<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeWhoWeAreLayoutTest extends TestCase
{
    public function test_who_we_are_places_content_before_the_supporting_image(): void
    {
        $html = view('site.home.sections.who_we_are', ['settings' => []])->render();

        $contentPosition = strpos($html, 'who-we-are-content');
        $imagePosition = strpos($html, 'who-we-are-media');

        $this->assertNotFalse($contentPosition);
        $this->assertNotFalse($imagePosition);
        $this->assertLessThan($imagePosition, $contentPosition);
    }
}
