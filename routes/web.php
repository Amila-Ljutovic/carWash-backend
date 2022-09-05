<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WashingStepController;
use App\Http\Controllers\WashingProgramController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

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



//washing steps
//Route::middleware(['cors'])->group(function () {
    
    Route::get('/washing-steps/all', [WashingStepController::class, 'getAll']);
    Route::post('/washing-steps/create', [WashingStepController::class, 'create']);
    Route::get('/washing-steps/{id}', [WashingStepController::class, 'getWashingStepById']);
    Route::put('/washing-steps/{id}', [WashingStepController::class, 'update']);
    Route::delete('/washing-steps/{id}', [WashingStepController::class, 'delete']);

    Route::get('/customers/all', [CustomerController::class, 'getAll']);
    Route::post('/customers/create', [CustomerController::class, 'create']);
    Route::get('/customers/{id}', [CustomerController::class, 'getCustomerById']);
    Route::put('/customers/{id}', [CustomerController::class, 'update']);
    Route::delete('/customers/{id}', [CustomerController::class, 'delete']);

    Route::get('/washing-programs/all', [WashingProgramController::class, 'getAll']);
    Route::get('/washing-programs/{id}', [WashingProgramController::class, 'getWashingProgramById']);
    Route::post('/washing-programs/create', [WashingProgramController::class, 'create']);
    Route::put('/washing-programs/{id}', [WashingProgramController::class, 'update']);

    Route::get('/transactions/all', [TransactionController::class, 'getAll']);
    Route::get('/transactions/{id}', [TransactionController::class, 'getTransactionById']);
    Route::post('/transactions/create', [TransactionController::class, 'create']);

    Route::get('/dashboard-data', [DashboardController::class, 'data']);

    Route::get('/', function () {
        return 'car wash app :)';
    });
//});
//customers


