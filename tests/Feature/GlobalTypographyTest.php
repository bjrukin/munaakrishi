<?php

namespace Tests\Feature;

use Tests\TestCase;

class GlobalTypographyTest extends TestCase
{
    public function test_inter_is_the_primary_font_across_site_admin_and_email(): void
    {
        $siteStyles = file_get_contents(public_path('assets/css/style.css'));
        $siteFonts = file_get_contents(resource_path('views/site/_partial/stylesheet.blade.php'));
        $adminHead = file_get_contents(resource_path('views/admin/_partial/metahead.blade.php'));
        $email = file_get_contents(resource_path('views/layout/email.blade.php'));

        $this->assertStringContainsString("--font-family: 'Inter'", $siteStyles);
        $this->assertStringContainsString('family=Inter:', $siteFonts);
        $this->assertStringContainsString('family=Inter:', $adminHead);
        $this->assertStringContainsString('font-family:Inter,sans-serif', $email);
        $this->assertStringNotContainsString('Source+Sans+3', $siteFonts.$adminHead);
        $this->assertStringNotContainsString('font-family:Montserrat', $email);
    }
}
