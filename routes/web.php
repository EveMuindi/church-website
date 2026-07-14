<?php

use Illuminate\Support\Facades\Route;
use App\Models\Announcement;
use App\Models\PrayerRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrayerRequestController;
use App\Http\Controllers\AnnouncementController;

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

require __DIR__.'/auth.php';