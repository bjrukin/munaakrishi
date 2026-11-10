<?php

namespace Tests\Feature;

use App\Http\Controllers\Site\NoticeController;
use App\Models\Notice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\View\View;
use Tests\TestCase;

class NewsDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_detail_renders_rich_text_and_related_stories(): void
    {
        Notice::create([
            'date' => '2026-10-30',
            'name' => 'Launch of the New Website of Munaa Krishi',
            'description' => '<p>We are pleased to announce the official launch.</p><p>Explore our services online.</p>',
            'status' => true,
        ]);
        Notice::create([
            'date' => '2026-10-29',
            'name' => 'Another Munaa Update',
            'description' => '<p>Another update.</p>',
            'status' => true,
        ]);

        $response = app(NoticeController::class)->detail('launch-of-the-new-website-of-munaa-krishi');

        $this->assertInstanceOf(View::class, $response);
        $this->assertCount(1, $response->getData()['related']);
        $this->assertNotSame(
            $response->getData()['article']['image'],
            $response->getData()['related'][0]['image']
        );

        $html = $response->render();
        $this->assertStringContainsString('<body class="news-detail-page">', $html);
        $this->assertStringContainsString('<p>We are pleased to announce the official launch.</p>', $html);
        $this->assertStringNotContainsString('&lt;p&gt;We are pleased', $html);
        $this->assertStringContainsString('More stories', $html);
        $this->assertStringContainsString('Another Munaa Update', $html);

        $stylesheet = file_get_contents(public_path('assets/css/style.css'));
        $this->assertStringContainsString('.news-detail-page .article-container', $stylesheet);
        $this->assertStringContainsString('.news-detail-page .back-link svg', $stylesheet);
    }
}
