<?php

use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\AdminController;
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

Route::group(['middleware' => 'api', 'prefix' => 'pedulikasih'], function () {
    Route::get('/', [CampaignController::class, 'index']);
    Route::get('/{campaign:slug}', [CampaignController::class, 'show']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'pedulikasih'], function() {
    Route::post('/store', [CampaignController::class, 'store']);
    Route::post('/update/{id}', [CampaignController::class, 'update']);
    Route::delete('/destroy/{id}', [CampaignController::class, 'destroy']);
    Route::post('/image/upload/{id}', [CampaignController::class, 'uploadImageCampaign']);
    Route::delete('/image/destroy/{id}', [CampaignController::class, 'deleteImageCampaign']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'transaction'], function() {
    Route::get('/', [TransactionController::class, 'index']);
    Route::post('/store', [TransactionController::class, 'store']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], function() {
    Route::get('/', [AuthController::class, 'userProfile']);
    Route::put('/edit/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/avatar', [UserController::class, 'avatar'])->name('user.avatar');
    Route::get('/campaigns', [UserController::class, 'campaigns'])->name('user.campaigns');
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group(['middleware' => ['auth:api', 'adminOnly'], 'prefix' => 'admin'], function () {
    Route::get('/pedulikasih/publish/{id}', [AdminController::class, 'publishCampaign']);
    Route::get('/transaction', [AdminController::class, 'listTransactions']);
    Route::get('/transaction/verify/{id}', [AdminController::class, 'verifyTransaction']);
});

