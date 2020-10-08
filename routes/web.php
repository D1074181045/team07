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

Route::get('/', function () {
    return view('welcome');
});

Route::get('varieties', function () {
    return view('varieties.index');
}) -> name('varieties.index');

Route::get('varieties/create', function () {
    return view('varieties.create');
}) -> name('varieties.create');

Route::get('varieties/{id}', function () {
    return view('varieties.show');
}) -> name('varieties.show');

Route::get('varieties/{id}/edit', function () {
    return view('varieties.edit');
}) -> name('varieties.edit');


/*
 *
 *
 */

Route::get('somatotypes', function () {
    return view('somatotypes.index');
}) -> name('somatotypes.index');

Route::get('somatotypes/create', function () {
    return view('somatotypes.create');
}) -> name('somatotypes.create');

Route::get('somatotypes/{id}', function () {
    return view('somatotypes.show');
}) -> name('somatotypes.show');

Route::get('somatotypes/{id}/edit', function () {
    return view('somatotypes.edit');
}) -> name('somatotypes.edit');

