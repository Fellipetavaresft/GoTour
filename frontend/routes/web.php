<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

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

Route::get('/', 'PacoteController@home');

Route::prefix('pacote')->group(Function(){
    Route::get('cadastro', 'PacoteController@cadastro');
    Route::post('cadastro', 'PacoteController@SalvarPacote');
    Route::get('edicao/', 'PacoteController@DescreverPacote');
    Route::post('edicao', 'PacoteController@EditarPacote');
    Route::get('exclusao/', 'PacoteController@ConfirmarExclusao');
    Route::post('exclusao', 'PacoteController@ExcluirPacote');
});
