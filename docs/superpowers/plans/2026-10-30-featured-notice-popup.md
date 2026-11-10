# Featured Notice Popup Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Let an administrator choose one active notice that automatically appears as a dismissible popup on the homepage.

**Architecture:** Store the selection as an `is_featured` boolean on notices, with the service updating the selected notice and clearing all others in one transaction. Render only the active featured notice into the existing homepage modal system, and key browser dismissal state to that notice’s database ID.

**Tech Stack:** Laravel, Blade, Eloquent, vanilla JavaScript, CSS, PHPUnit.

**Spec:** Approved chat specification from 2026-10-30.

## Global Constraints

- Only one notice may be featured at a time.
- Only a notice with `status = 1` may produce the homepage popup.
- A dismissed notice stays closed for that browser until a different notice is featured.
- No popup is rendered when no active featured notice exists.
- Preserve the site’s square-corner visual language and existing Munaa Krishi palette.
- Do not add a frontend dependency.

## Review Focus

- Featuring a second notice must atomically unfeature the first.
- Featuring an inactive notice must not show it on the homepage.
- Deleting or disabling the featured notice must leave the homepage without a popup.
- Rich notice descriptions must be presented safely without breaking modal layout.
- Keyboard and backdrop dismissal must restore focus and page scrolling.

---

### Task 1: Featured-notice persistence and invariant

**Files:**
- Create: `database/migrations/2026_10_30_000000_add_is_featured_to_notices_table.php`
- Modify: `app/Models/Notice.php`
- Modify: `app/Services/Admin/NoticeService.php`
- Test: `tests/Feature/Admin/FeaturedNoticeTest.php`

**Interfaces:**
- Produces: `Notice::scopeActiveFeatured(Builder $query): Builder`
- Produces: `NoticeService::feature(int $noticeId): JsonResponse`

- [ ] **Step 1: Write failing persistence tests**

  Test that featuring a notice sets `is_featured = true`, clears it from every other notice, and refuses a missing notice without changing the existing selection.

- [ ] **Step 2: Run the tests and verify the missing column/method failures**

  Run: `php artisan test tests/Feature/Admin/FeaturedNoticeTest.php --no-ansi`

- [ ] **Step 3: Add the migration, fillable cast/scope, and transactional service method**

  `is_featured` is a boolean defaulting to false. The transaction clears all flags and then flags exactly the requested notice.

- [ ] **Step 4: Run the focused tests and verify they pass**

  Run: `php artisan test tests/Feature/Admin/FeaturedNoticeTest.php --no-ansi`

### Task 2: Admin Feature action

**Files:**
- Modify: `routes/admin.php`
- Modify: `app/Http/Controllers/Admin/NoticeController.php`
- Modify: `resources/views/admin/notice/list.blade.php`
- Modify: `resources/views/admin/notice/js/list.blade.php`
- Test: `tests/Feature/Admin/FeaturedNoticeTest.php`

**Interfaces:**
- Consumes: `NoticeService::feature(int $noticeId): JsonResponse`
- Produces: named POST route `admin.notice.feature`

- [ ] **Step 1: Add failing route/action tests**

  Assert the POST action features the requested notice, unfetures the old selection, and returns a success response.

- [ ] **Step 2: Run the focused test and verify a missing-route failure**

  Run: `php artisan test tests/Feature/Admin/FeaturedNoticeTest.php --no-ansi`

- [ ] **Step 3: Implement the controller route and admin star control**

  Show a distinct filled star and “Featured” label for the selected row; use the project’s existing AJAX feedback pattern.

- [ ] **Step 4: Run focused tests and verify they pass**

  Run: `php artisan test tests/Feature/Admin/FeaturedNoticeTest.php --no-ansi`

### Task 3: Homepage-only featured popup

**Files:**
- Modify: `app/Http/Controllers/Site/HomeController.php`
- Modify: `resources/views/layout/site.blade.php`
- Modify: `resources/views/site/_partial/modals.blade.php`
- Modify: `public/assets/js/main.js`
- Modify: `public/assets/css/style.css`
- Test: `tests/Feature/HomeFeaturedNoticePopupTest.php`
- Test: `tests/js/notice-popup.test.js`

**Interfaces:**
- Consumes: `Notice::activeFeatured()->first()`
- Produces: modal `#notice-popup` with `data-notice-id`, title, date, summary, and full-notice URL

- [ ] **Step 1: Write failing homepage rendering tests**

  Assert an active featured notice renders on the homepage, an inactive featured notice does not, no selection renders no popup, and non-home pages do not render the automatic popup.

- [ ] **Step 2: Write failing dismissal-key tests**

  Assert storage key format `munaa-notice-dismissed-{database id}`, Escape/backdrop/close handling, scroll restoration, and focus restoration.

- [ ] **Step 3: Run both test files and verify expected failures**

  Run: `php artisan test tests/Feature/HomeFeaturedNoticePopupTest.php --no-ansi && node --test tests/js/notice-popup.test.js`

- [ ] **Step 4: Pass the featured notice from HomeController and render the modal only on home**

  Use escaped title/date/summary and a route to the existing full notice page. Do not query notices from the modal partial.

- [ ] **Step 5: Implement accessible modal behavior and restrained styling**

  Retain the current delayed opening, support close button/backdrop/Escape, restore the trigger/fallback focus and body scrolling, and respect reduced motion.

- [ ] **Step 6: Run focused PHP and JavaScript tests**

  Run: `php artisan test tests/Feature/HomeFeaturedNoticePopupTest.php --no-ansi && node --test tests/js/notice-popup.test.js`

### Task 4: Integration verification

**Files:**
- Verify: all changed files

**Interfaces:**
- Consumes: Tasks 1–3
- Produces: migration-ready, tested featured notice workflow

- [ ] **Step 1: Compile views and inspect routes**

  Run: `php artisan view:cache --no-ansi`

  Run: `php artisan route:list --name=admin.notice.feature --no-ansi`

- [ ] **Step 2: Run JavaScript syntax and behavior checks**

  Run: `node --check public/assets/js/main.js && node --test tests/js/*.test.js`

- [ ] **Step 3: Run the complete Laravel suite**

  Run: `php artisan test --no-ansi`

  Record the existing unrelated `/` 302-vs-200 example-test failure if it remains.

- [ ] **Step 4: Report migration requirement**

  Tell the user to run `php artisan migrate` if the migration was not executed in their local application database.
