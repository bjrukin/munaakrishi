# Product Category Management Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add discoverable admin CRUD for ranked, active/inactive product categories and make products use those categories safely.

**Architecture:** Introduce a `ProductCategory` model and `product_categories` table with an internal slug used by the public product UI. Replace the product category string with a foreign key, migrating all existing values and updating admin/public queries to use the relationship; deletion is rejected while products reference a category.

**Tech Stack:** PHP 8.2, Laravel 12, Blade, Bootstrap/admin JavaScript conventions, PHPUnit 11.

**Spec:** Approved conversation description from 2026-11-25.

## Global Constraints

- Admin-visible fields are category name, rank, and active/inactive status.
- Place “Product Categories” immediately below “Products” in the Business admin menu.
- Support add, update, delete, search, rank changes, and active/inactive toggling.
- A category assigned to any product cannot be deleted; show a clear message instructing the admin to move those products first.
- Product forms list active categories in rank order and require a valid active category.
- Preserve all existing category values, product assignments, and public category filtering during migration.
- Follow existing Laravel controller/service/request/Blade and JSON response conventions; add no dependency.

## Review Focus

- Duplicate category names with different case must be rejected on create and update.
- A stale or malicious request must not assign an inactive or nonexistent category to a product.
- Deleting an assigned category must leave both the category and products untouched and return a useful 422 response.
- Migration must retain unexpected existing category slugs such as `dairy`, not only the six hard-coded form choices.
- Public product filters, labels, detail pages, and related-product selection must keep working with the new relationship.

---

### Task 1: Category Persistence and Existing-Data Migration

**Files:**
- Create: `database/migrations/2026_11_25_000001_create_product_categories_and_assign_products.php`
- Create: `app/Models/ProductCategory.php`
- Modify: `app/Models/Product.php`
- Test: `tests/Feature/Admin/ProductCategoryMigrationTest.php`

**Interfaces:**
- Produces: `ProductCategory::products(): HasMany`, `Product::productCategory(): BelongsTo`, and `products.product_category_id` referencing `product_categories.id`.
- Produces: `product_categories` columns `id`, `name`, `slug`, `rank`, `status`, and timestamps; `name` and `slug` are unique.

- [ ] **Step 1: Write the failing migration/model tests**

Add tests named `test_existing_product_category_values_are_migrated_to_categories` and `test_product_belongs_to_a_product_category`. Assert distinct existing strings, including `dairy`, become ranked categories and products retain the correct assignment; assert the inverse relation returns assigned products.

- [ ] **Step 2: Run the focused tests and verify RED**

Run: `php artisan test tests/Feature/Admin/ProductCategoryMigrationTest.php`
Expected: FAIL because `ProductCategory`, the table, and relations do not exist.

- [ ] **Step 3: Implement the migration and models**

Create categories for every distinct existing `products.category` value, map known slugs to the current human labels, title-case unknown slugs, assign ranks deterministically, add/map `product_category_id`, then remove the old string column. The down migration must restore the slug string before removing the relationship and category table. Add typed Eloquent relations and category fillable/casts.

- [ ] **Step 4: Run the focused tests and verify GREEN**

Run: `php artisan test tests/Feature/Admin/ProductCategoryMigrationTest.php`
Expected: PASS.

- [ ] **Step 5: Commit the persistence slice**

```bash
git add app/Models database/migrations tests/Feature/Admin/ProductCategoryMigrationTest.php
git commit -m "feat: add product category persistence"
```

### Task 2: Admin Category CRUD and Safety Rules

**Files:**
- Create: `app/Http/Controllers/Admin/ProductCategoryController.php`
- Create: `app/Http/Requests/Admin/ProductCategory/StoreRequest.php`
- Create: `app/Services/Admin/ProductCategoryService.php`
- Modify: `routes/admin.php`
- Test: `tests/Feature/Admin/ProductCategoryManagementTest.php`

**Interfaces:**
- Consumes: `ProductCategory` and `ProductCategory::products()` from Task 1.
- Produces: routes `admin.product-category`, `.addEdit`, `.store`, `.delete`, `.status`, and `.rank` under `/admin/product-category`.
- Produces: `ProductCategoryService::list(string $q): array`, `store(array $data): JsonResponse`, `delete(Request $request): JsonResponse`, `status(Request $request): JsonResponse`, and `rank(Request $request): JsonResponse`.

- [ ] **Step 1: Write failing request/service/route tests**

Cover create, update, case-insensitive unique names, search, status, rank, unused deletion, assigned-category deletion returning 422 with the category preserved, authentication middleware, and named route availability.

- [ ] **Step 2: Run the focused tests and verify RED**

Run: `php artisan test tests/Feature/Admin/ProductCategoryManagementTest.php`
Expected: FAIL because the request, service, controller, and routes do not exist.

- [ ] **Step 3: Implement minimal validated CRUD**

Generate the internal slug from the name and keep it stable on rename so public filter URLs/data attributes remain compatible. Validate name as required/max 255 and case-insensitively unique, rank as integer/min 1, and status as boolean. Perform the assigned-product check before deletion and return the established JSON shape with HTTP 422 when blocked.

- [ ] **Step 4: Run the focused tests and verify GREEN**

Run: `php artisan test tests/Feature/Admin/ProductCategoryManagementTest.php`
Expected: PASS.

- [ ] **Step 5: Commit the backend CRUD slice**

```bash
git add app/Http/Controllers/Admin/ProductCategoryController.php app/Http/Requests/Admin/ProductCategory app/Services/Admin/ProductCategoryService.php routes/admin.php tests/Feature/Admin/ProductCategoryManagementTest.php
git commit -m "feat: add product category admin actions"
```

### Task 3: Discoverable Category Admin Screens

**Files:**
- Create: `resources/views/admin/product-category/list.blade.php`
- Create: `resources/views/admin/product-category/form.blade.php`
- Create: `resources/views/admin/product-category/form/info.blade.php`
- Create: `resources/views/admin/product-category/js/list.blade.php`
- Create: `resources/views/admin/product-category/js/form.blade.php`
- Modify: `resources/views/admin/_partial/nav.blade.php`
- Test: `tests/Feature/Admin/ProductCategoryViewTest.php`

**Interfaces:**
- Consumes: category routes and controller view data from Task 2.
- Produces: Business-menu entry with `sub_nav = product_category`, searchable list, Add Category action, edit/delete controls, rank selector, status switch, and name/rank form.

- [ ] **Step 1: Write failing rendered-view tests**

Assert “Product Categories” appears immediately after “Products” in the Business submenu; list markup includes search, rank, status, edit, and delete controls; form markup includes `name` and `rank`; blocked-delete JavaScript displays the server error instead of removing the row.

- [ ] **Step 2: Run the focused tests and verify RED**

Run: `php artisan test tests/Feature/Admin/ProductCategoryViewTest.php`
Expected: FAIL because the views and navigation item do not exist.

- [ ] **Step 3: Implement views using existing admin patterns**

Adapt the existing product/FAQ list and form conventions, use clear copy (“Add New Category”, “Category Name”, “Rank”, “Active”), and keep destructive actions confirmed through the existing alert flow.

- [ ] **Step 4: Run the focused tests and verify GREEN**

Run: `php artisan test tests/Feature/Admin/ProductCategoryViewTest.php`
Expected: PASS.

- [ ] **Step 5: Commit the admin UI slice**

```bash
git add resources/views/admin/product-category resources/views/admin/_partial/nav.blade.php tests/Feature/Admin/ProductCategoryViewTest.php
git commit -m "feat: add product category admin screens"
```

### Task 4: Product Admin Integration

**Files:**
- Modify: `app/Http/Controllers/Admin/ProductController.php`
- Modify: `app/Http/Requests/Admin/Product/StoreRequest.php`
- Modify: `app/Services/Admin/ProductService.php`
- Modify: `resources/views/admin/product/form/info.blade.php`
- Modify: `resources/views/admin/product/list.blade.php`
- Modify: `tests/Feature/Admin/ProductFormTest.php`

**Interfaces:**
- Consumes: `ProductCategory` model and `Product::productCategory()` from Task 1.
- Produces: product requests accept `product_category_id`; product forms receive `categories` containing active categories ordered by `rank`, then `name`.

- [ ] **Step 1: Update tests first for relationship-backed product forms and saves**

Assert only active categories appear in rank order, the current inactive category remains available while editing its assigned product, invalid/inactive assignments fail validation, saves persist `product_category_id`, and the product list renders the related category name.

- [ ] **Step 2: Run the focused tests and verify RED**

Run: `php artisan test tests/Feature/Admin/ProductFormTest.php`
Expected: FAIL because the form and service still use the removed `category` string.

- [ ] **Step 3: Implement product admin integration**

Eager-load `productCategory`, populate the dynamic category select, validate with an active-category existence rule while permitting the product’s current category on edit, persist the foreign key, and search/list by the related category name.

- [ ] **Step 4: Run the focused tests and verify GREEN**

Run: `php artisan test tests/Feature/Admin/ProductFormTest.php`
Expected: PASS.

- [ ] **Step 5: Commit product admin integration**

```bash
git add app/Http/Controllers/Admin/ProductController.php app/Http/Requests/Admin/Product/StoreRequest.php app/Services/Admin/ProductService.php resources/views/admin/product tests/Feature/Admin/ProductFormTest.php
git commit -m "feat: assign products to managed categories"
```

### Task 5: Public Product Compatibility and Full Verification

**Files:**
- Modify: `app/Http/Controllers/Site/ProductController.php`
- Modify: `resources/views/site/product/index.blade.php`
- Modify: `database/seeders/MunaaKrishiSeeder.php`
- Modify: `tests/Feature/ProductBreadcrumbTest.php`
- Create: `tests/Feature/ProductCategoryDisplayTest.php`

**Interfaces:**
- Consumes: category relationship and stable category slugs from Tasks 1 and 4.
- Produces: dynamic active category filter pills ordered by rank; product payloads retain `category` as the category slug and add the database category name as `category_label`.

- [ ] **Step 1: Write failing public compatibility tests**

Assert the product index renders active category filters in rank order, product cards use category slugs, detail labels use category names, related products match on `product_category_id`, inactive categories do not become filter pills, and seeded products attach to seeded categories.

- [ ] **Step 2: Run the focused public tests and verify RED**

Run: `php artisan test tests/Feature/ProductCategoryDisplayTest.php tests/Feature/ProductBreadcrumbTest.php`
Expected: FAIL because public code still reads the removed string field and hard-coded labels.

- [ ] **Step 3: Implement relationship-backed public display and seeding**

Eager-load categories, build filter pills from active categories, expose the stable slug and actual name in mapped product payloads, compare related products by foreign key, and make the seeder create/update categories before products.

- [ ] **Step 4: Run focused public and admin tests**

Run: `php artisan test tests/Feature/ProductCategoryDisplayTest.php tests/Feature/ProductBreadcrumbTest.php tests/Feature/Admin/ProductCategoryMigrationTest.php tests/Feature/Admin/ProductCategoryManagementTest.php tests/Feature/Admin/ProductCategoryViewTest.php tests/Feature/Admin/ProductFormTest.php`
Expected: PASS with zero failures.

- [ ] **Step 5: Run complete project verification**

Run: `composer test`
Expected: PASS with zero failures.

- [ ] **Step 6: Check formatting and route/migration health**

Run: `vendor/bin/pint --test && php artisan route:list --path=admin/product --no-ansi && php artisan migrate:fresh --seed --no-interaction`
Expected: formatter exit 0, category/product routes listed, and fresh seeded migration exit 0.

- [ ] **Step 7: Commit the compatibility slice**

```bash
git add app/Http/Controllers/Site/ProductController.php resources/views/site/product/index.blade.php database/seeders/MunaaKrishiSeeder.php tests/Feature/ProductBreadcrumbTest.php tests/Feature/ProductCategoryDisplayTest.php
git commit -m "feat: show managed product categories publicly"
```
