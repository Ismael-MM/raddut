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


// rutas 
// 1. paramaetro opcional
Route::get('/nombre/{name?}', function(?string $name = null){
    return $name;
});
// 2. parametro opcional con valor por defecto
Route::get('/nombre/{name?}', function(?string $name = 'lucas'){
    return $name;
});
// 3. metodo por post
Route::post('/nombreP/{name?}', function(?string $name = null){
    return $name;
});
// 4. metodo por post y get
Route::post('/apellido/{name?}', function(?string $name = null){
    return $name;
});

Route::get('/apellido/{name?}', function(?string $name = null){
    return $name;
});
// 5. limitando parametros
Route::get('/numeros/{numeros}', function (string $numeros) {
    return $numeros;
})->where('numeros', '[0-9]+');

Route::get('/parametros/{letra}/{numeros}', function (string $letra, string $numeros) {
    return $numeros;
})->where(['letra' => '[a-z]+', 'numeros' => '[0-9]+']);


// hepers
Route::get('/host', function () {
    return env('DB_HOST');
});

Route::get('/timezone', function () {
    return config('app.timezone');
});

//Mas sobre vistas