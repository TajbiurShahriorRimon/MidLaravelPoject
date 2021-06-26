<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\DonationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/user/admin/index', 'user.admin.index');
Route::get('/transaction', [\App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/userList', [UserController::class, 'index']);
Route::get('/user/profile/{id}', [UserController::class, 'show']);
Route::get('/user/changeStatus/{id}/{status}', [UserController::class, 'changeStatus']);
Route::view('/addManager', 'manager.create');
Route::post('/addManager', [UserController::class, 'addManager']);
Route::get('/donationReport/yearly', [DonationController::class, 'index']);
Route::get('/donorList', [DonationController::class, 'donorList']);
Route::get('/topDonor', [DonationController::class, 'topDonor']);


Route::get('/login', 'loginController@index');
Route::post('/login', 'loginController@verification');

Route::get('/org/forgotPass', 'orgForgotPass@index');
Route::post('/org/forgotPass', 'orgForgotPass@change');



Route::get('/signup', 'orgSignup@index');
Route::post('/signup', 'orgSignup@insert');



Route::group(['middleware'=>['sess']], function(){

    Route::get('/create', 'orgCreateController@index');
    Route::post('/create', 'orgCreateController@add');

    Route::get('/org_dashboard', 'orgDashboardController@index');

    Route::get('/org/mycampaign', 'orgMycampaign@index');
    Route::get('/org/delete/{eId}', 'orgMycampaign@delete');
    
    Route::get('/campaignDetails', 'orgCampaignDetails@index');
    Route::get('/transaction', 'orgCampaignTran@index');

    Route::get('/details', 'orgDetails@index')->name('org.details');
    Route::get('/editProfile', 'orgEditProfile@index');
    Route::post('/editProfile', 'orgEditProfile@update');



    Route::get('/org/logout', 'orgLogout@index');
});
