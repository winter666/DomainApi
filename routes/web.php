<?php

use App\Http\Controllers\HostingController;
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

Route::middleware('domain_verifier')->group(function() {
    Route::get('/', [HostingController::class, 'index']);
});

Route::fallback([HostingController::class, 'fallback']);
