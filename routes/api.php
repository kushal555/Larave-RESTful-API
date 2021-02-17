<?php

use App\Http\Controllers\MeetingController;
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

// Route::post('meeting', function (Request $request) {

//     // retrive request
//     $title = $request->title;
//     $description = $request->description;
//     $time = $request->time;

//     // Databse


//     // conditional logic


//     // response
//     return ['title' => $title,"description" => $description, "time" => $time];

// });
// Route::put('meeting/{id}/{user_id?}', function ($id,$user_id = null) {
//     return [$id,$user_id];
// });
// Route::delete('meeting', function () {
//     return "Hello this is delete route!";
// });

// Route::resource('meeting', MeetingController::class);
Route::get('meeting/list-atttendees','App\Http\Controllers\MeetingController@getParticipants')->name('meeting.get-attendees');
Route::apiResource('meeting', MeetingController::class);

Route::post('meeting/registration', function () {
    return "The Registraion request";
});

Route::delete('meeting/registration', function () {
    return "The Delete Request";
});
