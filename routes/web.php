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

Route::get('varieties/{id}', function ($id) {
    $dog_namw = "狗狗";
    return view('varieties.show') -> with(["varieties_id" => $id, "dog_name" => $dog_namw]);
}) -> name('varieties.show');

Route::get('varieties/{id}/edit', function () {
    $dog_namw = "及哇哇";
    $type = "瘋狗";
    $data = compact('dog_namw', 'type');
    return view('varieties.edit', $data);
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

Route::get('somatotypes/{id}', function ($id) {
    $data = [];
    $msg = "";
    if ($id > 10)
        $msg = "大於10";
    else
        $msg = "小於10";

    $data['somatotypes'] = $id;
    $data['message'] = $msg;
    return view('somatotypes.show', $data); // -> with("message", $msg);
}) -> name('somatotypes.show');

Route::get('somatotypes/{id}/edit', function () {
    return view('somatotypes.edit');
}) -> name('somatotypes.edit');

