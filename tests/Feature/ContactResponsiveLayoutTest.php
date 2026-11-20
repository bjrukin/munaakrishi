<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactResponsiveLayoutTest extends TestCase
{
    public function test_contact_page_has_full_width_mobile_bands_and_wrapping_tabs(): void
    {
        $styles = file_get_contents(base_path('assets/css/style.css'));

        $this->assertStringContainsString('.contact-page main > section', $styles);
        $this->assertStringContainsString('.contact-page .contact-tabs-nav', $styles);
        $this->assertStringContainsString('grid-template-columns: minmax(0, 1fr) minmax(0, 1fr)', $styles);
        $this->assertStringContainsString('white-space: normal', $styles);
    }

    public function test_site_stylesheet_is_versioned_so_mobile_fixes_are_not_cached(): void
    {
        $stylesheet = file_get_contents(resource_path('views/site/_partial/stylesheet.blade.php'));

        $this->assertStringContainsString("asset('assets/css/style.css') . '?v=' . filemtime", $stylesheet);
    }
}
