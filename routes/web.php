<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SmsAiController;

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


Route::get('/reseller-program', [HomeController::class, 'resellerProgram']);
Route::get('/contact-us', [HomeController::class, 'contactUs']);
Route::get('/chatbot', [HomeController::class, 'chatBot']);
Route::get('/sms-campaign', [HomeController::class, 'smsCampaign']);
Route::get('/auto-dialer', [HomeController::class, 'autoDialer']);

Route::get('/sign-up', [SignupController::class, 'index']);
Route::post('/store', [SignupController::class, 'store']);
Route::get('/verify-code', [SignupController::class, 'verifyCode'])->name('verifyCode');
Route::post('/store-verify-code', [SignupController::class, 'StoreVerifyCode']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/storeLogin', [LoginController::class, 'authenticate']);
Route::get('/resend-code/{userId}', [SignupController::class, 'resendCode'])->name('resend-code');

//sms ai work

Route::get('/sms/chat/demo', [SmsAiController::class, 'index']);

Route::post('otp/phone', [SmsAiController::class, 'otpPhone'])->name('otp-phone');











