<?php

use Faker\Core\Number;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nombre/{name?}', function(?string $name = null){
    return $name;
});

Route::get('/nombre/{name?}', function(?string $name = 'lucas'){
    return $name;
});

Route::post('/nombreP/{name?}', function(?string $name = null){
    return $name;
});

Route::post('/apellido/{name?}', function(?string $name = null){
    return $name;
});

Route::get('/apellido/{name?}', function(?string $name = null){
    return $name;
});

Route::get('/numeros/{numeros}', function (string $numeros) {
    return $numeros;
})->where('numeros', '[0-9]+');

Route::get('/parametros/{letra}/{numeros}', function (string $letra, string $numeros) {
    return $numeros;
})->where(['letra' => '[a-z]+', 'numeros' => '[0-9]+']);
