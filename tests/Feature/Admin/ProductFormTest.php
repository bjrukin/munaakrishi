<?php

namespace Tests\Feature\Admin;

use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Office;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\Admin\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ProductFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_form_contains_requested_fields_and_only_active_outlets(): void
    {
        $activeOutlet = Office::create(['name' => 'Sanepa Outlet', 'status' => 1]);
        $inactiveOutlet = Office::create(['name' => 'Closed Outlet', 'status' => 0]);
        $firstCategory = ProductCategory::where('slug', 'grains')->firstOrFail();
        $secondCategory = ProductCategory::where('slug', 'fruits')->firstOrFail();
        $firstCategory->update(['rank' => 2]);
        $secondCategory->update(['rank' => 1]);

        $html = (string) $this->view('admin.product.form', [
            'page_title' => 'Add Product',
            'action' => '/admin/product/store',
            'row' => null,
            'outlets' => Office::where('status', 1)->get(),
            'categories' => ProductCategory::where('status', 1)->orderBy('rank')->orderBy('name')->get(),
            'nav' => 'business',
            'sub_nav' => 'product',
        ]);

        $this->assertStringContainsString('name="name"', $html);
        $this->assertStringContainsString('name="product_category_id"', $html);
        $this->assertLessThan(strpos($html, 'Grains &amp; Flour'), strpos($html, 'Fruits'));
        $this->assertStringContainsString('name="district"', $html);
        $this->assertStringContainsString('name="detail"', $html);
        $this->assertStringContainsString('name="grown_by"', $html);
        $this->assertStringContainsString('name="storage"', $html);
        $this->assertStringContainsString('name="pack_size"', $html);
        $this->assertStringContainsString('name="price"', $html);
        $this->assertStringContainsString('name="image"', $html);
        $this->assertStringContainsString('name="outlet_ids[]"', $html);
        $this->assertStringContainsString('class="form-check-input outlet-checkbox"', $html);
        $this->assertStringContainsString('data-outlet-select-all', $html);
        $this->assertStringContainsString('Sanepa Outlet', $html);
        $this->assertStringNotContainsString('Closed Outlet', $html);
    }

    public function test_product_service_saves_product_details_and_selected_outlets(): void
    {
        $firstOutlet = Office::create(['name' => 'Sanepa Outlet', 'status' => 1]);
        $secondOutlet = Office::create(['name' => 'Pokhara Outlet', 'status' => 1]);
        $category = ProductCategory::where('slug', 'grains')->firstOrFail();

        app(ProductService::class)->store([
            'id' => 0,
            'name' => 'Jumla Marshi Rice',
            'product_category_id' => $category->id,
            'district' => 'Jumla',
            'detail' => 'Traditional red rice grown at high altitude.',
            'grown_by' => 'Jumla Farmer Cooperative',
            'storage' => 'Store in a cool, dry place.',
            'pack_size' => '1 kg',
            'price' => 350,
            'unit' => 'pack',
            'outlet_ids' => [$firstOutlet->id, $secondOutlet->id],
        ]);

        $product = Product::where('name', 'Jumla Marshi Rice')->firstOrFail();

        $this->assertSame('Traditional red rice grown at high altitude.', $product->detail);
        $this->assertTrue($product->productCategory->is($category));
        $this->assertSame('Jumla Farmer Cooperative', $product->grown_by);
        $this->assertSame('Store in a cool, dry place.', $product->storage);
        $this->assertSame('1 kg', $product->pack_size);
        $this->assertEqualsCanonicalizing(
            [$firstOutlet->id, $secondOutlet->id],
            $product->outlets()->pluck('offices.id')->all()
        );
    }

    public function test_product_request_rejects_inactive_or_missing_category(): void
    {
        $inactive = ProductCategory::where('slug', 'honey')->firstOrFail();
        $inactive->update(['status' => false]);
        $request = new StoreRequest;

        $inactiveValidator = Validator::make(['name' => 'Honey', 'product_category_id' => $inactive->id], $request->rules());
        $missingValidator = Validator::make(['name' => 'Mystery', 'product_category_id' => 999999], $request->rules());

        $this->assertArrayHasKey('product_category_id', $inactiveValidator->errors()->toArray());
        $this->assertArrayHasKey('product_category_id', $missingValidator->errors()->toArray());
    }
}
