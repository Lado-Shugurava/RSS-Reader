<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('startpage');
});

Route::get('/dashboard', [\App\Http\Controllers\Controller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/news', [\App\Http\Controllers\Controller::class, 'report'])->middleware(['auth', 'verified'])->name('news');

Route::get('/manage_channel', [\App\Http\Controllers\ChannelManageController::class, 'main'])->middleware(['auth', 'verified'])->name('manage_channel');
Route::get('/manage_channel/channels_index', [\App\Http\Controllers\ChannelManageController::class, 'index'])->middleware(['auth', 'verified'])->name('channels.index');
Route::get('/manage_channel/channels_create', [\App\Http\Controllers\ChannelManageController::class, 'create'])->middleware(['auth', 'verified'])->name('channels.create');
Route::post('/manage_channel/channels_index', [\App\Http\Controllers\ChannelManageController::class, 'store'])->middleware(['auth', 'verified'])->name('channels.store');
Route::get('/manage_channel/channels_index_for_edit', [\App\Http\Controllers\ChannelManageController::class, 'indexForEdit'])->middleware(['auth', 'verified'])->name('index_for_edit');
Route::get('/manage_channel/{channel}/edit', [\App\Http\Controllers\ChannelManageController::class, 'edit'])->middleware(['auth', 'verified'])->name('channels.edit');
Route::patch('/manage_channel/channels_index', [\App\Http\Controllers\ChannelManageController::class, 'update'])->middleware(['auth', 'verified'])->name('channels.update');
Route::get('/manage_channel/channels_index_for_delete', [\App\Http\Controllers\ChannelManageController::class, 'indexForDelete'])->middleware(['auth', 'verified'])->name('index_for_delete');
Route::get('/manage_channel/{channel}/confirm_delete', [\App\Http\Controllers\ChannelManageController::class, 'confirm_delete'])->middleware(['auth', 'verified'])->name('confirm_delete');
Route::delete('/manage_channel/channels_index', [\App\Http\Controllers\ChannelManageController::class, 'destroy'])->middleware(['auth', 'verified'])->name('channels.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
