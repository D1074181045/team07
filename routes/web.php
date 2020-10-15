<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SomatotypesController;
use App\Http\Controllers\VarietiesController;

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
    return view('welcome');
});

// Route::get('varieties', function () { return view('varieties.index'); }) -> name('varieties.index');

Route::get('varieties', [VarietiesController::class, 'index']) -> name('varieties.index');

Route::get('varieties/create', [VarietiesController::class, 'create']) -> name('varieties.create');

Route::get('varieties/{id}', [VarietiesController::class, 'show']) -> name('varieties.show');

Route::get('varieties/{id}/edit',  [VarietiesController::class, 'edit']) -> name('varieties.edit');

/*
 *
 *
 */

Route::get('somatotypes', [SomatotypesController::class, 'index']) -> name('somatotypes.index');

Route::get('somatotypes/create', [SomatotypesController::class, 'create']) -> name('somatotypes.create');

Route::get('somatotypes/{id}', [SomatotypesController::class, 'show'] ) -> name('somatotypes.show');

Route::get('somatotypes/{id}/edit', [SomatotypesController::class, 'edit']) -> name('somatotypes.edit');

