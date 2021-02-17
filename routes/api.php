<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// v1/{slug}
Route::prefix('v1')->group(function () {
    Route::apiResource('meeting', MeetingController::class);
    Route::apiResource('meeting/registration',RegistrationController::class)->only(['store','destroy']);
});
