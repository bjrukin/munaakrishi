<?php

namespace Tests\Feature;

use App\Models\Notice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeFeaturedNoticePopupTest extends TestCase
{
    use RefreshDatabase;

    public function test_featured_notice_is_rendered_with_its_identity_and_content(): void
    {
        $notice = Notice::create([
            'date' => '2026-10-30',
            'name' => 'Dashain harvest collection',
            'description' => '<p>Collection starts from Jumla this week.</p>',
            'status' => true,
            'is_featured' => true,
        ]);

        $view = $this->view('site._partial.modals', ['featured_notice' => $notice]);

        $view->assertSee('id="notice-popup"', false);
        $view->assertSee('data-notice-id="'.$notice->id.'"', false);
        $view->assertSee('data-notice-version="'.$notice->updated_at->timestamp.'"', false);
        $view->assertSee('Dashain harvest collection');
        $view->assertSee('October 30, 2026');
        $view->assertSee('id="notice-popup-summary"', false);
        $view->assertSee('Collection starts from Jumla this week.');
        $view->assertSee('>Read more</a>', false);
        $view->assertSee(route('news.detail', 'dashain-harvest-collection'));
        $view->assertDontSee('notice-popup-image', false);
    }

    public function test_featured_notice_with_an_image_shows_only_the_image_and_title(): void
    {
        $notice = Notice::create([
            'date' => '2026-10-30',
            'name' => 'Dashain harvest collection',
            'description' => '<p>Collection starts from Jumla this week.</p>',
            'image' => 'harvest-poster.webp',
            'status' => true,
            'is_featured' => true,
        ]);

        $view = $this->view('site._partial.modals', ['featured_notice' => $notice]);

        $view->assertSee('class="notice-popup-image"', false);
        $view->assertSee($notice->url_image, false);
        $view->assertSee('Dashain harvest collection');
        $view->assertDontSee('id="notice-popup-summary"', false);
        $view->assertDontSee('aria-describedby="notice-popup-summary"', false);
        $view->assertDontSee('Collection starts from Jumla this week.');
        $view->assertDontSee('Read more');
        $view->assertDontSee(route('news.detail', 'dashain-harvest-collection'), false);
    }

    public function test_blank_notice_image_is_treated_as_no_image(): void
    {
        $notice = Notice::create([
            'date' => '2026-10-30',
            'name' => 'Market day notice',
            'description' => '<p>The Saturday market opens at dawn.</p>',
            'image' => '   ',
            'status' => true,
            'is_featured' => true,
        ]);

        $view = $this->view('site._partial.modals', ['featured_notice' => $notice]);

        $view->assertDontSee('notice-popup-image', false);
        $view->assertSee('The Saturday market opens at dawn.');
        $view->assertSee('>Read more</a>', false);
    }

    public function test_notice_popup_is_not_rendered_without_a_featured_notice(): void
    {
        $this->view('site._partial.modals', ['featured_notice' => null])
            ->assertDontSee('id="notice-popup"', false);
    }
}
