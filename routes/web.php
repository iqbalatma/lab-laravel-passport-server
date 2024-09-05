<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\DenyAuthorizationController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\ScopeController;
use Laravel\Passport\Http\Controllers\TransientTokenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//
//Route::prefix("oauth")->name("passport.")->group(function () {
//    Route::post('/token', [AccessTokenController::class, "issueToken"])->name('token')->middleware("throttle");
//
//    Route::get('/authorize', [AuthorizationController::class, "authorize"])->name('authorizations.authorize')->middleware(['web']);
//
//
//    $guard = config('passport.guard', null);
//    Route::middleware(['web', $guard ? 'auth:' . $guard : 'auth'])->group(function () {
//        Route::post('/token/refresh', [TransientTokenController::class, 'refresh'])->name('token.refresh');
//
//        Route::post('/authorize', [ApproveAuthorizationController::class, "approve"])->name("authorizations.approve");
//
//        Route::delete('/authorize', [DenyAuthorizationController::class, "deny"])->name('authorizations.deny');
//
//        Route::get('/tokens', [AuthorizedAccessTokenController::class, "forUser"])->name('tokens.index');
//
//        Route::delete('/tokens/{token_id}', [AuthorizedAccessTokenController::class, "destroy"])->name("tokens.destroy");
//
//        Route::get('/clients', [ClientController::class, "forUser"])->name('clients.index');
//
//        Route::post('/clients', [ClientController::class, "store"])->name('clients.store');
//
//        Route::put('/clients/{client_id}', [ClientController::class, "update"])->name('clients.update');
//
//        Route::delete('/clients/{client_id}', [ClientController::class, "destroy"])->name('clients.destroy');
//
//        Route::get('/scopes', [ScopeController::class, "all"])->name('scopes.index');
//
//        Route::get('/personal-access-tokens', [PersonalAccessTokenController::class, "forUser"])->name('personal-access-tokens.index');
//
//        Route::post('/personal-access-tokens', [PersonalAccessTokenController::class, "store"])->name('personal-access-tokens.store');
//
//        Route::delete('/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, "destroy"])->name('personal-access-tokens.destroy');
//    });
//});
