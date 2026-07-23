<?php

use Illuminate\Support\Facades\Route;
use App\Models\Announcement;
use App\Models\PrayerRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrayerRequestController;
use App\Http\Controllers\AnnouncementController;
use App\Models\Event;
use App\Http\Controllers\EventController;
use App\Models\Member;
use App\Http\Controllers\MemberController;
use App\Models\Sermon;
use App\Http\Controllers\SermonController;
use App\Models\Gallery;
use App\Http\Controllers\GalleryController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $announcements = Announcement::latest()->get();

    return view('welcome', compact('announcements'));

});

Route::view('/about', 'about');
Route::view('/ministries', 'ministries');
Route::get('/events', function () {

    $events = Event::latest()->get();

    return view('events.public', compact('events'));

});

/*
|--------------------------------------------------------------------------
| Prayer Requests
|--------------------------------------------------------------------------
*/

Route::get('/prayer', function () {
    return view('prayer');
});

Route::post('/prayer', [PrayerRequestController::class, 'store']);

/*
|--------------------------------------------------------------------------
| Announcements (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/announcements', [AnnouncementController::class, 'index']);
    Route::get('/announcements/create', [AnnouncementController::class, 'create']);
    Route::post('/announcements', [AnnouncementController::class, 'store']);

    Route::get('/announcements/{id}/edit', [AnnouncementController::class, 'edit']);
    Route::put('/announcements/{id}', [AnnouncementController::class, 'update']);
    Route::delete('/announcements/{id}', [AnnouncementController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Events (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/events', [EventController::class, 'index']);
    Route::get('/admin/events/create', [EventController::class, 'create']);
    Route::post('/admin/events', [EventController::class, 'store']);

    Route::get('/admin/events/{id}/edit', [EventController::class, 'edit']);
    Route::put('/admin/events/{id}', [EventController::class, 'update']);
    Route::delete('/admin/events/{id}', [EventController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Members (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/members/create', [MemberController::class, 'create']);
    Route::post('/members', [MemberController::class, 'store']);

    Route::get('/members/{id}/edit', [MemberController::class, 'edit']);
    Route::put('/members/{id}', [MemberController::class, 'update']);
    Route::delete('/members/{id}', [MemberController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Sermons (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/sermons', [SermonController::class, 'index']);
    Route::get('/sermons/create', [SermonController::class, 'create']);
    Route::post('/sermons', [SermonController::class, 'store']);

    Route::get('/sermons/{id}/edit', [SermonController::class, 'edit']);
    Route::put('/sermons/{id}', [SermonController::class, 'update']);
    Route::delete('/sermons/{id}', [SermonController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Gallery (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/gallery', [GalleryController::class, 'index']);
    Route::get('/gallery/create', [GalleryController::class, 'create']);
    Route::post('/gallery', [GalleryController::class, 'store']);

    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
    Route::put('/gallery/{id}', [GalleryController::class, 'update']);
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Dashboard (Breeze)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

    $prayerRequests = PrayerRequest::latest()->get();

    $announcements = Announcement::latest()->take(5)->get();

    return view('admin', [
        'prayerRequests' => $prayerRequests,
        'announcementCount' => Announcement::count(),
        'eventCount' => Event::count(),
        'memberCount' => Member::count(),
        'announcements' => $announcements,
    ]);

})->middleware(['auth', 'admin']);

/*
|--------------------------------------------------------------------------
| Prayer Request Management (Admin Only)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/prayer/{id}', [PrayerRequestController::class, 'show']);
    Route::get('/prayer/{id}/edit', [PrayerRequestController::class, 'edit']);
    Route::put('/prayer/{id}', [PrayerRequestController::class, 'update']);
    Route::delete('/prayer/{id}', [PrayerRequestController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| Breeze Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/settings', [SettingController::class, 'edit'])
    ->middleware(['auth', 'admin']);

Route::post('/settings', [SettingController::class, 'update'])
    ->middleware(['auth', 'admin']);

Route::view('/giving', 'giving');

// Public Sermons
Route::get('/sermons', [SermonController::class, 'public']);

// Public Contact Page
Route::view('/contact', 'contact');

Route::get('/sermons', [SermonController::class, 'public']);
Route::view('/contact', 'contact');

require __DIR__.'/auth.php';