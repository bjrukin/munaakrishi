<?php

namespace Tests\Feature\Admin;

use App\Http\Requests\Admin\ProductCategory\StoreRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\Admin\ProductCategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ProductCategoryManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_service_creates_updates_searches_and_changes_category_state(): void
    {
        $service = app(ProductCategoryService::class);
        $created = $service->store(['name' => 'Cooking Oils', 'rank' => 8, 'status' => true]);
        $this->assertSame(201, $created->getStatusCode());

        $category = ProductCategory::where('name', 'Cooking Oils')->firstOrFail();
        $this->assertSame('cooking-oils', $category->slug);
        $service->store(['id' => $category->id, 'name' => 'Natural Oils', 'rank' => 3, 'status' => true]);
        $this->assertDatabaseHas('product_categories', ['id' => $category->id, 'name' => 'Natural Oils', 'slug' => 'cooking-oils', 'rank' => 3]);

        $results = $service->list('Natural');
        $this->assertCount(1, $results['categories']);

        $service->status(new Request(['id' => $category->id, 'val' => 0]));
        $service->rank(new Request(['id' => $category->id, 'rank' => 12]));
        $this->assertDatabaseHas('product_categories', ['id' => $category->id, 'status' => 0, 'rank' => 12]);
    }

    public function test_category_name_validation_is_case_insensitively_unique(): void
    {
        ProductCategory::create(['name' => 'Organic Tea', 'slug' => 'organic-tea', 'rank' => 20, 'status' => true]);
        $request = new StoreRequest;
        $validator = Validator::make(['name' => 'organic tea', 'rank' => 21, 'status' => true], $request->rules());

        $this->assertTrue($validator->fails());
    }

    public function test_unused_category_can_be_deleted_but_assigned_category_is_protected(): void
    {
        $service = app(ProductCategoryService::class);
        $unused = ProductCategory::create(['name' => 'Unused', 'slug' => 'unused', 'rank' => 20, 'status' => true]);
        $this->assertSame(200, $service->delete(new Request(['id' => $unused->id]))->getStatusCode());
        $this->assertModelMissing($unused);

        $assigned = ProductCategory::where('slug', 'grains')->firstOrFail();
        Product::create(['name' => 'Rice', 'slug' => 'rice', 'product_category_id' => $assigned->id]);
        $response = $service->delete(new Request(['id' => $assigned->id]));

        $this->assertSame(422, $response->getStatusCode());
        $this->assertStringContainsString('Move those products', $response->getContent());
        $this->assertModelExists($assigned);
    }

    public function test_product_category_admin_routes_are_registered(): void
    {
        foreach (['admin.product-category', 'admin.product-category.addEdit', 'admin.product-category.store', 'admin.product-category.delete', 'admin.product-category.status', 'admin.product-category.rank'] as $name) {
            $this->assertTrue(Route::has($name), "Missing route {$name}");
        }
    }
}
