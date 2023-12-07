<?php

use App\Http\Controllers\IdiomasController;
use App\Http\Controllers\TraducoesController;
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

// Rotas para IdiomasController
Route::prefix('idiomas')->group(function () {
    Route::get('/', [IdiomasController::class, 'index']);
    Route::get('/{idiomas}', [IdiomasController::class, 'show']);
    Route::put('/{idiomas}', [IdiomasController::class, 'update']);
    Route::delete('/{idiomas}', [IdiomasController::class, 'destroy']);
    Route::post('/save', [IdiomasController::class, 'store']);
});

// Rotas para TraducoesController
Route::prefix('traducoes')->group(function () {
    Route::get('/', [TraducoesController::class, 'index']);
    Route::get('/{traducao}', [TraducoesController::class, 'show']);
    Route::put('/{traducao}', [TraducoesController::class, 'update']);
    Route::post('/register', [TraducoesController::class, 'store']);
    Route::delete('/{traducao}', [TraducoesController::class, 'destroy']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
