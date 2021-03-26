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

Route::view('/hello', 'hello', ['name' => 'Matheus']);

Route::get('/products/{id}', function ($id) {
    return sprintf('Produto código %s', $id);
});

Route::get('/users/{id?}', function ($id = null) {
    if (is_null($id)) {
        return 'Todos usuários';
    }
    return sprintf('Usuário código %s', $id);
});

Route::get('/customers/{cpf}', function ($cpf) {
    return $cpf;
})->where(['cpf' => '[0-9]{11}']);

Route::view('/students', 'students');

Route::get('/students/{ra}', function ($ra) {
    return $ra;
})->name('students');