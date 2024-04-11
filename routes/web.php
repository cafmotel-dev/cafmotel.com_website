<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); });

Route::get('/virtual-number', [HomeController::class, 'virtualNumber']);
Route::get('/cloud-call-center-solutions', [HomeController::class, 'cloudCallCenterSolution']);

Route::get('/ivr-solutions', [HomeController::class, 'ivrSolutions']);
Route::get('/number-masking', [HomeController::class, 'numberMasking']);
Route::get('/click-to-call', [HomeController::class, 'clickToCall']);
Route::get('/lead-management', [HomeController::class, 'leadManagement']);
Route::get('/toll-free-number', [HomeController::class, 'tollFreeNumber']);




