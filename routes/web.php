<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AddInvestController;
use App\Http\Controllers\UploadController;


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

Route::get('/', function () {
    return view('home');
});

Route::view('registration','registration')->name('registration');
Route::view('login','login')->name('login');
Route::view('admin','admin')->name('admin');


Route::post('registration',[RegistrationController::class,'registration']);
Route::post('profile',[RegistrationController::class,'profile']);
Route::post('admin_profile',[RegistrationController::class,'admin_profile']);
Route::post('login',[RegistrationController::class,'login']);
Route::post('admin',[RegistrationController::class,'admin']);
Route::get('Account_verification',[RegistrationController::class,'Account_verification']);
Route::get('addtofavour',[RegistrationController::class,'addtofavour']);
Route::get('awaitingMatches',[RegistrationController::class,'awaitingMatches']);
Route::get('del',[RegistrationController::class,'del']);
Route::get('logout',[RegistrationController::class,'logout']);
Route::get('adminvalidatePayto',[RegistrationController::class,'adminvalidatePayto']);
Route::get('unban',[RegistrationController::class,'unban']);
Route::get('test',[RegistrationController::class,'test']);
Route::post('activationfee',[RegistrationController::class,'activationfee']);
Route::get('activation',[RegistrationController::class,'activation']);
Route::get('actreceiver',[RegistrationController::class,'actreceiver']);


Route::get('countuser',[RegistrationController::class,'countuser']);
Route::get('countban',[RegistrationController::class,'countban']);
Route::get('countpen',[RegistrationController::class,'countpen']);

Route::get('ucountuser',[RegistrationController::class,'ucountuser']);
Route::get('ucountban',[RegistrationController::class,'ucountban']);
Route::get('ucountpen',[RegistrationController::class,'ucountpen']);




Route::get('addInvestment',[AddInvestController::class,'addInvestment']);
Route::get('confirm',[AddInvestController::class,'confirm_r']);
Route::post('upload', [UploadController::class,'index']);
Route::get('match',[AddInvestController::class,'match']);

Route::group(['middleware'=> 'usersession'], function(){
    Route::view('user_dash','user_dash');
    Route::view('deposit','deposit');
    Route::view('on_goingInvestment','on_goingInvestment');
    Route::view('payto','payto');
    Route::view('upload','upload');
    Route::view('profile','profile');
    Route::view('returns','returns');
    Route::view('history','history');
    
});

Route::group(['middleware'=> 'adminsession'], function(){
    
    Route::view('admin_dash','admin_dash');
    Route::view('admin_profile','admin_profile');
    Route::view('listofusers','listofusers');
    Route::view('matches','matches');
    Route::view('activationfee','activationfee');
    Route::view('unlock','unlock');
    Route::view('m','m');
});

