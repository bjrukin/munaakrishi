<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeJourneyAnimationTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_provides_a_scoped_animation_hook(): void
    {
        $view = $this->view('site.home.index');

        $view->assertSee('home-page', false);
    }

    public function test_what_we_do_items_reveal_in_numbered_sequence(): void
    {
        $section = view('site.home.sections.what_we_do', [
            'settings' => [],
        ])->render();

        $this->assertSame(7, substr_count($section, 'what-we-do-step'));
        $this->assertStringContainsString('--step-index: 0', $section);
        $this->assertStringContainsString('--step-index: 6', $section);

        $script = file_get_contents(public_path('assets/js/main.js'));
        $stylesheet = file_get_contents(public_path('assets/css/style.css'));

        $this->assertStringContainsString('.what-we-do-step', $script);
        $this->assertStringContainsString('var(--step-index)', $stylesheet);
    }

}
