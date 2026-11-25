<?php

namespace Tests\Feature;

use App\Http\Controllers\Site\ProductController;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class ProductCategoryDisplayTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_catalog_uses_active_ranked_category_filters_and_slugs(): void
    {
        Product::query()->delete();
        ProductCategory::query()->update(['status' => false]);
        $fruit = ProductCategory::where('slug', 'fruits')->firstOrFail();
        $grain = ProductCategory::where('slug', 'grains')->firstOrFail();
        $fruit->update(['status' => true, 'rank' => 1]);
        $grain->update(['status' => true, 'rank' => 2]);
        Product::create(['name' => 'Apple', 'slug' => 'apple', 'product_category_id' => $fruit->id, 'status' => true]);

        $view = app(ProductController::class)->index(Request::create('/products'));
        $html = $view->render();

        $this->assertLessThan(strpos($html, 'data-category="grains"'), strpos($html, 'data-category="fruits"'));
        $this->assertStringContainsString('data-category="fruits"', $html);
        $this->assertStringNotContainsString('data-category="honey"', $html);
    }

    public function test_product_detail_uses_category_name_and_category_relationship_for_related_products(): void
    {
        Product::query()->delete();
        $grain = ProductCategory::where('slug', 'grains')->firstOrFail();
        $fruit = ProductCategory::where('slug', 'fruits')->firstOrFail();
        $main = Product::create(['name' => 'Rice', 'slug' => 'rice', 'product_category_id' => $grain->id, 'status' => true]);
        Product::create(['name' => 'Flour', 'slug' => 'flour', 'product_category_id' => $grain->id, 'status' => true]);
        Product::create(['name' => 'Apple', 'slug' => 'apple-related', 'product_category_id' => $fruit->id, 'status' => true]);

        $view = app(ProductController::class)->detail($main->slug);
        $html = $view->render();

        $this->assertStringContainsString('Grains &amp; Flour', $html);
        $this->assertStringContainsString('Flour', $html);
        $this->assertStringNotContainsString('Apple', $html);
    }

    public function test_home_product_card_uses_the_managed_category_name(): void
    {
        $grain = ProductCategory::where('slug', 'grains')->firstOrFail();
        $product = Product::create(['name' => 'Millet', 'slug' => 'millet', 'product_category_id' => $grain->id, 'status' => true]);

        $html = (string) $this->view('site.home.sections.products', [
            'settings' => [],
            'featured_products' => collect([$product->load('productCategory')]),
        ]);

        $this->assertStringContainsString('Grains &amp; Flour', $html);
    }
}
