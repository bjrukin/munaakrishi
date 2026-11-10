<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CkeditorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GeneralsettingController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\LeadershipController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductionController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('admin.login');
Route::post('check-login', [AuthController::class, 'checkLogin'])->name('admin.checkLogin');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('admin.forgot.password');
Route::post('otp', [AuthController::class, 'otp'])->name('admin.otp');
Route::get('reset-password', [AuthController::class, 'resetPassword'])->name('admin.reset.password');
Route::post('save-password', [AuthController::class, 'savePassword'])->name('admin.save.password');

Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/ckeditor', [CkeditorController::class, 'uploadImage'])->name('ckeditor.upload');

    Route::prefix('account')->group(function () {
        Route::get('/', [AccountController::class, 'index'])->name('admin.account.setting');
        Route::post('/update-account', [AccountController::class, 'addAction'])->name('admin.account.update');
        Route::post('/update-password', [AccountController::class, 'updatePassword'])->name('admin.account.update.password');
        Route::get('/logout', [AccountController::class, 'logout'])->name('admin.logout');
    });

    Route::prefix('achievement')->group(function () {
        Route::get('/', [AchievementController::class, 'list'])->name('admin.achievement');
        Route::get('/add.edit', [AchievementController::class, 'addEdit'])->name('admin.achievement.addEdit');
        Route::post('/store', [AchievementController::class, 'store'])->name('admin.achievement.store');
        Route::post('/imagedelete', [AchievementController::class, 'imageDelete'])->name('admin.achievement.imagedelete');
        Route::post('/delete', [AchievementController::class, 'delete'])->name('admin.achievement.delete');
        Route::post('/status', [AchievementController::class, 'status'])->name('admin.achievement.status');
    });

    Route::prefix('banner')->group(function () {
        Route::get('/', [BannerController::class, 'list'])->name('admin.banner');
        Route::get('/add.edit', [BannerController::class, 'addEdit'])->name('admin.banner.addEdit');
        Route::post('/order', [BannerController::class, 'order'])->name('admin.banner.order');
        Route::post('/store', [BannerController::class, 'store'])->name('admin.banner.store');
        Route::post('/imagedelete', [BannerController::class, 'imageDelete'])->name('admin.banner.imagedelete');
        Route::post('/delete', [BannerController::class, 'delete'])->name('admin.banner.delete');
        Route::post('/status', [BannerController::class, 'status'])->name('admin.banner.status');
    });

    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'list'])->name('admin.brand');
        Route::get('/add.edit', [BrandController::class, 'addEdit'])->name('admin.brand.addEdit');
        Route::post('/store', [BrandController::class, 'store'])->name('admin.brand.store');
        Route::post('/imagedelete', [BrandController::class, 'imageDelete'])->name('admin.brand.imagedelete');
        Route::post('/delete', [BrandController::class, 'delete'])->name('admin.brand.delete');
        Route::post('/status', [BrandController::class, 'status'])->name('admin.brand.status');
    });

    Route::prefix('career')->group(function () {
        Route::get('/', [CareerController::class, 'list'])->name('admin.career');
        Route::get('/add.edit', [CareerController::class, 'addEdit'])->name('admin.career.addEdit');
        Route::post('/store', [CareerController::class, 'store'])->name('admin.career.store');
        Route::post('/delete', [CareerController::class, 'delete'])->name('admin.career.delete');
        Route::post('/status', [CareerController::class, 'status'])->name('admin.career.status');
    });

    Route::prefix('gallery')->group(function () {
        Route::get('/', [GalleryController::class, 'list'])->name('admin.gallery');
        Route::post('/status', [GalleryController::class, 'status'])->name('admin.gallery.status');
        Route::get('/add.edit', [GalleryController::class, 'addEdit'])->name('admin.gallery.addEdit');
        Route::post('/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::post('/imagedelete', [GalleryController::class, 'imageDelete'])->name('admin.gallery.imagedelete');
        Route::post('/delete', [GalleryController::class, 'delete'])->name('admin.gallery.delete');
        Route::get('/images', [GalleryController::class, 'images'])->name('admin.gallery.images');
        Route::post('/save.images', [GalleryController::class, 'saveImages'])->name('admin.gallery.saveimages');
        Route::post('/imagesdelete', [GalleryController::class, 'imagesDelete'])->name('admin.gallery.imagesdelete');
        Route::post('/image.order', [GalleryController::class, 'imageOrder'])->name('admin.gallery.imageOrder');
        Route::post('/order', [GalleryController::class, 'order'])->name('admin.gallery.order');
    });

    Route::prefix('generalsetting')->group(function () {
        Route::get('/', [GeneralsettingController::class, 'index'])->name('admin.generalsetting');
        Route::post('/store', [GeneralsettingController::class, 'store'])->name('admin.generalsetting.store');
        Route::post('/imagedelete', [GeneralsettingController::class, 'imageDelete'])->name('admin.generalsetting.imagedelete');
    });

    Route::prefix('history')->group(function () {
        Route::get('/', [HistoryController::class, 'list'])->name('admin.history');
        Route::get('/add.edit', [HistoryController::class, 'addEdit'])->name('admin.history.addEdit');
        Route::post('/store', [HistoryController::class, 'store'])->name('admin.history.store');
        Route::post('/delete', [HistoryController::class, 'delete'])->name('admin.history.delete');
        Route::post('/status', [HistoryController::class, 'status'])->name('admin.history.status');
    });

    Route::prefix('leadership')->group(function () {
        Route::get('/', [LeadershipController::class, 'list'])->name('admin.leadership');
        Route::post('/order', [LeadershipController::class, 'order'])->name('admin.leadership.order');
        Route::get('/add.edit', [LeadershipController::class, 'addEdit'])->name('admin.leadership.addEdit');
        Route::post('/store', [LeadershipController::class, 'store'])->name('admin.leadership.store');
        Route::post('/imagedelete', [LeadershipController::class, 'imageDelete'])->name('admin.leadership.imagedelete');
        Route::post('/delete', [LeadershipController::class, 'delete'])->name('admin.leadership.delete');
        Route::post('/status', [LeadershipController::class, 'status'])->name('admin.leadership.status');
    });

    Route::prefix('notice')->group(function () {
        Route::get('/', [NoticeController::class, 'list'])->name('admin.notice');
        Route::get('/add.edit', [NoticeController::class, 'addEdit'])->name('admin.notice.addEdit');
        Route::post('/store', [NoticeController::class, 'store'])->name('admin.notice.store');
        Route::post('/delete', [NoticeController::class, 'delete'])->name('admin.notice.delete');
        Route::post('/imagedelete', [NoticeController::class, 'imageDelete'])->name('admin.notice.imagedelete');
        Route::post('/status', [NoticeController::class, 'status'])->name('admin.notice.status');
        Route::post('/feature', [NoticeController::class, 'feature'])->name('admin.notice.feature');
    });

    Route::prefix('office')->group(function () {
        Route::get('/', [OfficeController::class, 'list'])->name('admin.office');
        Route::post('/order', [OfficeController::class, 'order'])->name('admin.office.order');
        Route::get('/add.edit', [OfficeController::class, 'addEdit'])->name('admin.office.addEdit');
        Route::post('/store', [OfficeController::class, 'store'])->name('admin.office.store');
        Route::post('/delete', [OfficeController::class, 'delete'])->name('admin.office.delete');
        Route::post('/status', [OfficeController::class, 'status'])->name('admin.office.status');
    });

    Route::prefix('page')->group(function () {
        Route::get('/', [PageController::class, 'list'])->name('admin.page');
        Route::get('/add.edit', [PageController::class, 'addEdit'])->name('admin.page.addEdit');
        Route::post('/store', [PageController::class, 'store'])->name('admin.page.store');
        Route::post('/imagedelete', [PageController::class, 'imageDelete'])->name('admin.page.imagedelete');
        Route::post('/status', [PageController::class, 'status'])->name('admin.page.status');
    });

    Route::prefix('production')->group(function () {
        Route::get('/', [ProductionController::class, 'list'])->name('admin.production');
        Route::post('/order', [ProductionController::class, 'order'])->name('admin.production.order');
        Route::get('/add.edit', [ProductionController::class, 'addEdit'])->name('admin.production.addEdit');
        Route::post('/store', [ProductionController::class, 'store'])->name('admin.production.store');
        Route::post('/imagedelete', [ProductionController::class, 'imageDelete'])->name('admin.production.imagedelete');
        Route::post('/delete', [ProductionController::class, 'delete'])->name('admin.production.delete');
        Route::post('/status', [ProductionController::class, 'status'])->name('admin.production.status');
    });

    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'list'])->name('admin.project');
        Route::get('/add.edit', [ProjectController::class, 'addEdit'])->name('admin.project.addEdit');
        Route::post('/store', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::post('/imagedelete', [ProjectController::class, 'imageDelete'])->name('admin.project.imagedelete');
        Route::post('/delete', [ProjectController::class, 'delete'])->name('admin.project.delete');
        Route::post('/status', [ProjectController::class, 'status'])->name('admin.project.status');
    });

    Route::prefix('seo')->group(function () {
        Route::get('/', [SeoController::class, 'list'])->name('admin.seo');
        Route::get('/add.edit', [SeoController::class, 'addEdit'])->name('admin.seo.addEdit');
        Route::post('/store', [SeoController::class, 'store'])->name('admin.seo.store');
        Route::post('/delete', [SeoController::class, 'delete'])->name('admin.seo.delete');
    });

    Route::prefix('sociallink')->group(function () {
        Route::get('/', [SocialLinkController::class, 'index'])->name('admin.sociallink');
        Route::post('/store', [SocialLinkController::class, 'store'])->name('admin.sociallink.store');
    });

    Route::prefix('team')->group(function () {
        Route::get('/', [TeamController::class, 'list'])->name('admin.team');
        Route::post('/order', [TeamController::class, 'order'])->name('admin.team.order');
        Route::get('/add.edit', [TeamController::class, 'addEdit'])->name('admin.team.addEdit');
        Route::post('/store', [TeamController::class, 'store'])->name('admin.team.store');
        Route::post('/imagedelete', [TeamController::class, 'imageDelete'])->name('admin.team.imagedelete');
        Route::post('/delete', [TeamController::class, 'delete'])->name('admin.team.delete');
        Route::post('/status', [TeamController::class, 'status'])->name('admin.team.status');
    });

    Route::prefix('testimonial')->group(function () {
        Route::get('/', [TestimonialController::class, 'list'])->name('admin.testimonial');
        Route::get('/add.edit', [TestimonialController::class, 'addEdit'])->name('admin.testimonial.addEdit');
        Route::post('/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
        Route::post('/imagedelete', [TestimonialController::class, 'imageDelete'])->name('admin.testimonial.imagedelete');
        Route::post('/delete', [TestimonialController::class, 'delete'])->name('admin.testimonial.delete');
        Route::post('/status', [TestimonialController::class, 'status'])->name('admin.testimonial.status');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'list'])->name('admin.product');
        Route::get('/add.edit', [\App\Http\Controllers\Admin\ProductController::class, 'addEdit'])->name('admin.product.addEdit');
        Route::post('/order', [\App\Http\Controllers\Admin\ProductController::class, 'order'])->name('admin.product.order');
        Route::post('/store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.store');
        Route::post('/imagedelete', [\App\Http\Controllers\Admin\ProductController::class, 'imageDelete'])->name('admin.product.imagedelete');
        Route::post('/delete', [\App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('admin.product.delete');
        Route::post('/status', [\App\Http\Controllers\Admin\ProductController::class, 'status'])->name('admin.product.status');
    });

    Route::prefix('farm')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\FarmController::class, 'list'])->name('admin.farm');
        Route::get('/add.edit', [\App\Http\Controllers\Admin\FarmController::class, 'addEdit'])->name('admin.farm.addEdit');
        Route::post('/order', [\App\Http\Controllers\Admin\FarmController::class, 'order'])->name('admin.farm.order');
        Route::post('/store', [\App\Http\Controllers\Admin\FarmController::class, 'store'])->name('admin.farm.store');
        Route::post('/imagedelete', [\App\Http\Controllers\Admin\FarmController::class, 'imageDelete'])->name('admin.farm.imagedelete');
        Route::post('/delete', [\App\Http\Controllers\Admin\FarmController::class, 'delete'])->name('admin.farm.delete');
        Route::post('/status', [\App\Http\Controllers\Admin\FarmController::class, 'status'])->name('admin.farm.status');
    });

    Route::prefix('faq')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\FaqController::class, 'list'])->name('admin.faq');
        Route::get('/add.edit', [\App\Http\Controllers\Admin\FaqController::class, 'addEdit'])->name('admin.faq.addEdit');
        Route::post('/order', [\App\Http\Controllers\Admin\FaqController::class, 'order'])->name('admin.faq.order');
        Route::post('/store', [\App\Http\Controllers\Admin\FaqController::class, 'store'])->name('admin.faq.store');
        Route::post('/delete', [\App\Http\Controllers\Admin\FaqController::class, 'delete'])->name('admin.faq.delete');
        Route::post('/status', [\App\Http\Controllers\Admin\FaqController::class, 'status'])->name('admin.faq.status');
    });

    Route::prefix('video')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\VideoController::class, 'list'])->name('admin.video');
        Route::get('/add.edit', [\App\Http\Controllers\Admin\VideoController::class, 'addEdit'])->name('admin.video.addEdit');
        Route::post('/order', [\App\Http\Controllers\Admin\VideoController::class, 'order'])->name('admin.video.order');
        Route::post('/store', [\App\Http\Controllers\Admin\VideoController::class, 'store'])->name('admin.video.store');
        Route::post('/imagedelete', [\App\Http\Controllers\Admin\VideoController::class, 'imageDelete'])->name('admin.video.imagedelete');
        Route::post('/delete', [\App\Http\Controllers\Admin\VideoController::class, 'delete'])->name('admin.video.delete');
        Route::post('/status', [\App\Http\Controllers\Admin\VideoController::class, 'status'])->name('admin.video.status');
    });

    Route::prefix('homepage')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\HomepageSectionController::class, 'list'])->name('admin.homepage');
        Route::get('/add.edit', [\App\Http\Controllers\Admin\HomepageSectionController::class, 'addEdit'])->name('admin.homepage.addEdit');
        Route::get('/edit', [\App\Http\Controllers\Admin\HomepageSectionController::class, 'addEdit'])->name('admin.homepage.edit');
        Route::post('/store', [\App\Http\Controllers\Admin\HomepageSectionController::class, 'store'])->name('admin.homepage.store');
        Route::post('/delete', [\App\Http\Controllers\Admin\HomepageSectionController::class, 'delete'])->name('admin.homepage.delete');
        Route::post('/status', [\App\Http\Controllers\Admin\HomepageSectionController::class, 'status'])->name('admin.homepage.status');
        Route::post('/order', [\App\Http\Controllers\Admin\HomepageSectionController::class, 'order'])->name('admin.homepage.order');
    });

});
