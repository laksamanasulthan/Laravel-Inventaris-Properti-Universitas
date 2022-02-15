<?php

use App\Http\Controllers\API\AuthController as AC;
use App\Http\Controllers\API\MahasiswaController as APIMahasiswaController;
use App\Http\Controllers\MahasiswaController;
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

Route::post('login', [AC::class, 'signin']);
Route::post('register', [AC::class, 'signup']);

Route::middleware('auth:sanctum')->group(function () {
	Route::resource('mahasiswa', APIMahasiswaController::class);
});
Route::resource('mahasiswanoauth', APIMahasiswaController::class);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// 	return $request->user();
// });

Route::get('mahasiswanoauth', [MahasiswaController::class, 'index']);
Route::post('mahasiswanoauth', [MahasiswaController::class, 'create']);
// Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
// Route::delete('mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
