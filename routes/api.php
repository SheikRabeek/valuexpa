<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\PriceMailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\InsightDetails;
use App\Http\Controllers\CareerDetails;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CaseDetails;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PublicationDetailsController;
use App\Http\Controllers\FormPublicationController;
use App\Http\Controllers\FormContactController;

Route::apiResource('insight', InsightController::class);
Route::resource('career', CareerController::class);
Route::resource('casestudy', CaseStudyController::class);
Route::get('insights/{slug}',[InsightDetails::class,'insights']);
Route::get('careers/{title}', [CareerDetails::class, 'careers']);
Route::get('cases/{slug}', [CaseDetails::class, 'cases']);
Route::get('allusers', [UserController::class, 'allusers']);

Route::resource('publication', PublicationController::class);
Route::get('publications/{slug}', [PublicationDetailsController::class, 'get']);

Route::resource('form/publication', FormPublicationController::class, ['as' => 'form.publication']);
Route::resource('form/contact', FormContactController::class, ['as' => 'form.contact']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('athenticated', [UserController::class, 'athenticated']);
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('logout', [UserController::class, 'logout']);

