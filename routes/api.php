<?php
use App\Http\Controllers\API\PeminjamanBarangController;
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
Route::get('peminjamanbarang', [PeminjamanBarangController::class, 'index']);
Route::post('peminjamanbarang/store', [PeminjamanBarangController::class, 'store']);
Route::get('peminjamanbarang/show/{id}', [PeminjamanBarangController::class, 'show']);
Route::post('peminjamanbarang/update/{id}', [PeminjamanBarangController::class, 'update']);
Route::get('peminjamanbarang/destroy/{id}', [PeminjamanBarangController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
