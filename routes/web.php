<?php

use App\Http\Controllers\SellerController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/seller/dashboard');
Route::prefix('seller')->group(function () {
    Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
    Route::post('/product/add', [SellerController::class, 'addProduct'])->name('seller.addProduct');
    Route::post('/product/update', [SellerController::class, 'updateProduct'])->name('seller.updateProduct');
    Route::get('/chat-menu', [ChatController::class, 'chatMenu'])->name('chat.menu');
    Route::match(['get', 'post'], '/chat/{partner_id?}', [ChatController::class, 'chat'])->name('chat.page');
    Route::get('/status', [SellerController::class, 'status'])->name('seller.status');
    Route::get('/faq', function () {
        return view('seller.faq');
    })->name('seller.faq');
});


