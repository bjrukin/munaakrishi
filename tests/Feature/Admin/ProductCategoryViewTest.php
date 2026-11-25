<?php

namespace Tests\Feature\Admin;

use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCategoryViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_business_navigation_places_product_categories_after_products(): void
    {
        $html = (string) $this->view('admin._partial.nav', ['nav' => 'business', 'sub_nav' => 'product_category']);
        $products = strpos($html, '>Products<');
        $categories = strpos($html, '>Product Categories<');

        $this->assertNotFalse($products);
        $this->assertNotFalse($categories);
        $this->assertGreaterThan($products, $categories);
    }

    public function test_category_list_and_form_expose_management_controls(): void
    {
        $category = ProductCategory::firstOrFail();
        $list = (string) $this->view('admin.product-category.list', [
            'page_title' => 'Product Categories',
            'q' => '',
            'result' => ['categories' => collect([$category]), 'count' => 1],
            'nav' => 'business',
            'sub_nav' => 'product_category',
        ]);
        $form = (string) $this->view('admin.product-category.form', [
            'page_title' => 'Add Product Category',
            'action' => route('admin.product-category.store'),
            'row' => null,
            'nav' => 'business',
            'sub_nav' => 'product_category',
        ]);

        $this->assertStringContainsString('Add New Category', $list);
        $this->assertStringContainsString('name="q"', $list);
        $this->assertStringContainsString('changeRank', $list);
        $this->assertStringContainsString('switch-status', $list);
        $this->assertStringContainsString('deleteData', $list);
        $this->assertStringContainsString('res.message || res.error', $list);
        $this->assertStringContainsString('name="name"', $form);
        $this->assertStringContainsString('name="rank"', $form);
    }
}
