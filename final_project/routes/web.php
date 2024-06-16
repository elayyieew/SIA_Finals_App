<?php
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\EventController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/events', function () {
    return view('user.events');
})->name('events');
Route::get('/settings', function () {
    return view('user.settings');
})->name('settings');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/workspace', [WorkspaceController::class, 'index'])->name('workspace.index');
    Route::post('/workspace', [WorkspaceController::class, 'store'])->name('workspace.store');
});

Route::get('/dashboard', [WorkspaceController::class, 'create'])->name('dashboard');
Route::post('/workspaces', [WorkspaceController::class, 'store'])->name('workspaces.store');
Route::delete('/workspaces/{id}', [WorkspaceController::class, 'destroy'])->name('workspaces.destroy');

Route::get('/events', [EventController::class, 'index'])->name('events');

require __DIR__.'/auth.php';
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(['auth','admin']);

