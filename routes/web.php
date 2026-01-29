<?php

use App\Http\Controllers\PriceMailController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');

Route::post('/notification', [PriceMailController::class, 'index']);
Route::get('/AI-automation-ROI-Calc', function () {
    return view('AI-automation-ROI-Calc');
});
