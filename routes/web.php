<?php

use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\FarmController;
use App\Http\Controllers\Site\GalleryController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\NoticeController;
use App\Http\Controllers\Site\OutletController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\SitemapXmlController;
use App\Http\Controllers\Site\VideoController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [SitemapXmlController::class, 'index']);

// About
Route::get('/about', [AboutController::class, 'whoWeAre'])->name('about');
Route::get('/who-we-are', [AboutController::class, 'whoWeAre'])->name('who-we-are');
Route::get('/chairman-message', [AboutController::class, 'chairmanMessage'])->name('chairman.message');
Route::get('/leadership', [AboutController::class, 'chairmanMessage'])->name('leadership');
Route::get('/board-of-directors', [AboutController::class, 'boardOfDirectors'])->name('board.of.directors');
Route::get('/team', [AboutController::class, 'ourTeam'])->name('team');
Route::get('/our-team', [AboutController::class, 'ourTeam'])->name('our-team');

// Business: Products & Farmer Origin
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/{slug}', [ProductController::class, 'detail'])->name('products.detail');
});

Route::prefix('farms')->group(function () {
    Route::get('/', [FarmController::class, 'index'])->name('farms');
    Route::get('/{slug}', [FarmController::class, 'detail'])->name('farms.detail');
});

// Outlets
Route::get('/outlets', [OutletController::class, 'index'])->name('outlets');

// Media: News, Gallery, Videos
Route::prefix('news')->group(function () {
    Route::get('/', [NoticeController::class, 'index'])->name('news');
    Route::get('/{slug}', [NoticeController::class, 'detail'])->name('news.detail');
});
Route::get('/notice', [NoticeController::class, 'index'])->name('notice');

Route::prefix('gallery')->group(function () {
    Route::get('/', [GalleryController::class, 'list'])->name('gallery');
    Route::get('/photos/{slug}', [GalleryController::class, 'photos'])->name('gallery.photos');
});

Route::get('/videos', [VideoController::class, 'index'])->name('videos');

// Support & Info
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Legal & Policies
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/privacy-policy-alias', [PageController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/cookie-policy', [PageController::class, 'cookiePolicy'])->name('cookie-policy');
Route::get('/cookie-policy-alias', [PageController::class, 'cookiePolicy'])->name('cookie.policy');
Route::get('/terms-conditions', [PageController::class, 'termsConditions'])->name('terms-conditions');
