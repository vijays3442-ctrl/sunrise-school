<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\HeroSlider;
use App\Models\Achievement;
use App\Models\Notice;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\Admin\PageImageController;
use App\Http\Controllers\SiteContentController;

Route::get('/', function () {
    $sliders = HeroSlider::where('is_active', true)->orderBy('sort_order', 'asc')->get();
    $achievements = Achievement::where('is_active', true)->orderBy('sort_order', 'asc')->get();
    $latest_notices = Notice::where('is_active', true)->orderBy('date', 'desc')->take(3)->get();
    return view('welcome', compact('sliders', 'achievements', 'latest_notices'));
})->name('home');

Route::get('/disclosure', function () {
    return view('disclosure');
})->name('disclosure');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/academics', function () {
    return view('academics');
})->name('academics');

Route::get('/admissions', function () {
    return view('admissions');
})->name('admissions');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/educators', function () {
    return view('educators');
})->name('educators');

Route::get('/notices', [NoticeController::class, 'publicIndex'])->name('notices.index');

Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');

Route::get('/{section}', [SiteContentController::class, 'index'])
    ->where('section', 'facilities|student-enrichment|information')
    ->name('site.section');

Route::get('/{section}/{slug}', [SiteContentController::class, 'show'])
    ->where('section', 'about|academics|admissions|facilities|educators|student-enrichment|information|disclosure')
    ->where('slug', '[a-z0-9-]+')
    ->name('site.page');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Gallery Admin Routes
    Route::get('/dashboard/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::post('/dashboard/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::delete('/dashboard/gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

    // Static page and section image management
    Route::get('/dashboard/page-images', [PageImageController::class, 'index'])->name('admin.page-images.index');
    Route::put('/dashboard/page-images/{pageImage}', [PageImageController::class, 'update'])->name('admin.page-images.update');
    Route::delete('/dashboard/page-images/{pageImage}', [PageImageController::class, 'reset'])->name('admin.page-images.reset');

    // Slider Admin Routes
    Route::resource('/dashboard/sliders', \App\Http\Controllers\Admin\HeroSliderController::class)->names([
        'index' => 'admin.sliders.index',
        'create' => 'admin.sliders.create',
        'store' => 'admin.sliders.store',
        'edit' => 'admin.sliders.edit',
        'update' => 'admin.sliders.update',
        'destroy' => 'admin.sliders.destroy',
    ]);

    // Notice Admin Routes
    Route::resource('/dashboard/notices', \App\Http\Controllers\NoticeController::class)->names([
        'index' => 'admin.notices.index',
        'create' => 'admin.notices.create',
        'store' => 'admin.notices.store',
        'edit' => 'admin.notices.edit',
        'update' => 'admin.notices.update',
        'destroy' => 'admin.notices.destroy',
    ]);
});

require __DIR__.'/auth.php';
