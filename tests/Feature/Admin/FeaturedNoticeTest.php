<?php

namespace Tests\Feature\Admin;

use App\Models\Notice;
use App\Services\Admin\NoticeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class FeaturedNoticeTest extends TestCase
{
    use RefreshDatabase;

    public function test_featuring_a_notice_replaces_the_previous_selection(): void
    {
        $previous = Notice::create($this->noticeAttributes(['is_featured' => true]));
        $selected = Notice::create($this->noticeAttributes(['name' => 'Selected notice']));

        $response = app(NoticeService::class)->feature($selected->id);

        $this->assertSame(200, $response->getStatusCode());
        $this->assertFalse($previous->fresh()->is_featured);
        $this->assertTrue($selected->fresh()->is_featured);
        $this->assertSame(1, Notice::where('is_featured', true)->count());
    }

    public function test_active_featured_scope_ignores_hidden_notices(): void
    {
        Notice::create($this->noticeAttributes(['status' => false, 'is_featured' => true]));

        $this->assertNull(Notice::activeFeatured()->first());
    }

    public function test_admin_feature_route_is_available_as_a_post_action(): void
    {
        $route = Route::getRoutes()->getByName('admin.notice.feature');

        $this->assertNotNull($route);
        $this->assertContains('POST', $route->methods());
        $this->assertStringEndsWith('@feature', $route->getActionName());
    }

    private function noticeAttributes(array $overrides = []): array
    {
        return array_merge([
            'date' => '2026-10-30',
            'name' => 'Harvest notice',
            'description' => 'Fresh produce is available.',
            'status' => true,
            'is_featured' => false,
        ], $overrides);
    }
}
