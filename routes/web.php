<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\DataKasusKorupsiController;

Route::get('/', [DataKasusKorupsiController::class, 'index']);

Route::prefix('data')->group(function() {
	Route::get('/data-kasus-korupsi-pertahun', [DataKasusKorupsiController::class, 'dataKasusKorupsiPertahun'])->name('data-kasus.pertahun');
	Route::get('/data-kasus-korupsi-perdaerah', [DataKasusKorupsiController::class, 'dataKasusKorupsiPerDaerah'])->name('data-kasus.perdaerah');
	Route::get('/data-kasus-korupsi-perlembaga', [DataKasusKorupsiController::class, 'dataKasusKorupsiPerLembaga'])->name('data-kasus.perlembaga');
	Route::get('/data-kasus-korupsi-persektor', [DataKasusKorupsiController::class, 'dataKasusKorupsiPerSektor'])->name('data-kasus.persektor');
});
