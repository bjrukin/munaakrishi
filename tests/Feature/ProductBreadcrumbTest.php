<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductBreadcrumbTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_detail_uses_a_readable_light_surface_breadcrumb(): void
    {
        $view = $this->view('site.product.detail', [
            'page_title' => 'Jumla Marsi Red Rice',
            'product' => [
                'name' => 'Jumla Marsi Red Rice',
                'nepali' => 'जुम्ला मार्सी चामल',
                'category_label' => 'Grains',
                'district' => 'Jumla',
                'image' => 'assets/images/products/rice-marsi.jpg',
                'tag' => 'New harvest',
                'unit' => 'kg',
                'description' => 'High-altitude red rice.',
                'producer' => '',
                'pack_sizes' => '1 kg',
                'storage' => 'Store in a cool, dry place.',
                'details' => 'High-altitude red rice.',
            ],
            'related_products' => [],
        ]);

        $view->assertSee('class="breadcrumbs breadcrumbs--light"', false);

        $stylesheet = file_get_contents(public_path('assets/css/style.css'));
        $this->assertStringContainsString('.breadcrumbs--light a', $stylesheet);
        $this->assertStringContainsString('color: var(--color-forest)', $stylesheet);
    }
}
