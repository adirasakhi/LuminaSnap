<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationController;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'explore'])->name('explore');

Route::get('/feed', [FeedController::class, 'index'])->name('feed');
Route::get('/search', [FeedController::class, 'search'])->name('search');

Route::get('/photo/{id}', [PhotoController::class, 'show'])->name('photo.show');
Route::get('/user/{id}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/albums/{id}', [AlbumController::class, 'show'])->name('album.show');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

    // UPLOAD PHOTO
    Route::get('/upload', [PhotoController::class, 'create'])->name('photo.create');
    Route::post('/upload', [PhotoController::class, 'store'])->name('photo.store');
    Route::post('/photo/{id}/add-to-album', [PhotoController::class, 'addToAlbum'])->name('photo.addToAlbum');

    // LIKE / COMMENT
    Route::post('/photo/{id}/like', [LikeController::class, 'toggle'])->name('photo.like');
    Route::post('/photo/{id}/comment', [CommentController::class, 'store'])->name('photo.comment');

    // REPORT PHOTO
    Route::post('/photo/{id}/report', [ReportController::class, 'store'])->name('photo.report');

    // FOLLOW
    Route::post('/follow/{id}', [FollowController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{id}', [FollowController::class, 'unfollow'])->name('unfollow');

    // ALBUMS (create/store/view)
    Route::get('/albums', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/albums/create', [AlbumController::class, 'create'])->name('album.create');
    Route::post('/albums', [AlbumController::class, 'store'])->name('album.store');

    // NOTIFICATIONS
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::delete('/admin/photo/{id}', [AdminController::class, 'deletePhoto'])
        ->name('admin.delete.photo');

    Route::post('/admin/user/{id}/ban', [AdminController::class, 'banUser'])
        ->name('admin.ban.user');

    Route::post('/admin/user/{id}/unban', [AdminController::class, 'unbanUser'])
        ->name('admin.unban.user');
});


require __DIR__.'/auth.php';
