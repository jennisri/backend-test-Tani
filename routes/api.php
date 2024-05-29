<?php

use App\Http\Controllers\TaniController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/tani', [TaniController::class, 'index']);
Route::post('/tani', [TaniController::class, 'store']);
Route::put('/tani', [TaniController::class, 'store']);

Route::apiResource('/tani', TaniController::class)->only('index', 'store', 'update');
