<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckAuthenticated;
use App\Http\Middleware\CheckNotAuthenticated;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ViewsController;

Route::middleware(['web'])->group(function () {

    Route::get('/', [ViewsController::class, 'showHomepage'])->name('homepage');
    Route::get('/listing-property', [BienController::class, 'showAllProperties'])->name('listing-property');
    Route::get('/detail-property/{id}', [ViewsController::class, 'showPropertyDetail'])->name('detail-property');
    Route::get('/contact', function () {
        return view('contact.form');
    })->name('contact');
    Route::get('/sale-form', function () {
        return view('property.sale');
    })->name('sale-form');
    Route::get('user-account', [ViewsController::class, 'showUserAccount'])->name('user-account');
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/admin-account', [ViewsController::class, 'showAdminAccount'])->name('admin-account');
    });
    Route::post('/register-user', [UtilisateurController::class, 'registerUser'])->name('register-user');
    Route::post('/register-property', [BienController::class, 'registerProperty'])->name('register-property');
    Route::get('/search-properties', [BienController::class, 'searchProperties'])->name('search-properties');
    Route::get('/search-properties-city', [BienController::class, 'searchPropertiesByCity'])->name('search-properties-city');
    Route::post('/send-contact-request', [UtilisateurController::class, 'sendContactRequest'])->name('send-contact-request');
    Route::post('/update-user', [UtilisateurController::class, 'updateUser'])->name('update-user');
    Route::post('/send-notification-client', [UtilisateurController::class, 'sendNotificationClient'])->name('send-notification-client');
    Route::post('/add-favorite', [UtilisateurController::class, 'addFavorite'])->name('add-favorite');
    Route::post('/remove-favorite', [UtilisateurController::class, 'removeFavorite'])->name('remove-favorite');
    Route::post('/load-more-properties', [BienController::class, 'loadMoreProperties'])->name('load-more-properties');
    Route::post('/save-search', [UtilisateurController::class, 'saveSearch'])->name('save-search');
    Route::get('retake-search/{id}', [BienController::class, 'retakeUserSearch'])->name('retake-search');
    Route::delete('/delete-search/{id}', [UtilisateurController::class, 'deleteUserSearch'])->name('delete-search');
    Route::delete('/delete-contact-request/{id}', [UtilisateurController::class, 'deleteContactRequest'])->name('delete-contact-request');
    Route::post('change-visibility-property/{id}', [BienController::class, 'changeVisibilityProperty'])->name('change-visibility-property');
    Route::post('delete-property/{id}', [BienController::class, 'deleteProperty'])->name('delete-property');
    Route::middleware([CheckNotAuthenticated::class])->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/login', [AuthController::class, 'processLogin']);
        Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
        Route::post('/register', [AuthController::class, 'processRegister']);
    });
    Route::middleware([CheckAuthenticated::class])->group(function () {
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
});
