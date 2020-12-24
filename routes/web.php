<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SomatotypesController;
use App\Http\Controllers\VarietiesController;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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

/*-----------------------------------------------------------------------------------------------------------------------*/

Route::get("/", function () {
    return Redirect::to('/varieties/page=1');
});

Route::get('welcome', function () {
    return view('welcome');
});

/*-----------------------------------------------------------------------------------------------------------------------*/

Route::get('varieties/page={page}', [VarietiesController::class, 'index'])->name('varieties.index');
// 查詢

Route::get('varieties/source/page={page}', [VarietiesController::class, 'source'])->name('varieties.source');
// 查詢指定原產地

Route::get('varieties/type/page={page}', [VarietiesController::class, 'type'])->name('varieties.type');
// 查詢指定體型

Route::get('varieties/create', [VarietiesController::class, 'create'])->name('varieties.create');
Route::post('varieties/store', [VarietiesController::class, 'store'])->name('varieties.store');
// 新增

Route::get('varieties/show', [VarietiesController::class, 'show'])->name('varieties.show');
// 單一查詢

Route::get('varieties/{id}/edit', [VarietiesController::class, 'edit'])->name('varieties.edit');
Route::patch('varieties/{id}/update', [VarietiesController::class, 'update'])->name('varieties.update');
// 更新

Route::delete('varieties/{id}/destroy', [VarietiesController::class, 'destroy'])->name('varieties.destroy');
// 刪除

/*-----------------------------------------------------------------------------------------------------------------------*/

Route::get('somatotypes/page={page}', [SomatotypesController::class, 'index'])->name('somatotypes.index');
// 查詢

Route::get('somatotypes/create', [SomatotypesController::class, 'create'])->name('somatotypes.create');
Route::post('somatotypes/store', [SomatotypesController::class, 'store'])->name('somatotypes.store');
// 新增

Route::get('somatotypes/show', [SomatotypesController::class, 'show'])->name('somatotypes.show');
// 單一查詢
Route::get('somatotypes/{id}', [SomatotypesController::class, 'show2'])->name('somatotypes.show2');
// 單一查詢2

Route::get('somatotypes/{id}/edit', [SomatotypesController::class, 'edit'])->name('somatotypes.edit');
Route::patch('somatotypes/{id}/update', [SomatotypesController::class, 'update'])->name('somatotypes.update');
// 更新

Route::delete('somatotypes/{id}/destroy', [SomatotypesController::class, 'destroy'])->name('somatotypes.destroy');
// 刪除

/*-----------------------------------------------------------------------------------------------------------------------*/
