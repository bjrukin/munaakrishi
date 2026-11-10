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
        $view->assertSee('Collection starts from Jumla this week.');
        $view->assertSee(route('news.detail', 'dashain-harvest-collection'));
    }

    public function test_notice_popup_is_not_rendered_without_a_featured_notice(): void
    {
        $this->view('site._partial.modals', ['featured_notice' => null])
            ->assertDontSee('id="notice-popup"', false);
    }
}
