<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProductosController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Listar todos los productos
Route::middleware('cors')->get('/productos', 'ProductosController@index');

//Devolver un solo producto
Route::middleware('cors')->get('/productos/{id}', 'ProductosController@show');

//Guardar un producto
Route::middleware('cors')->post('/productos', 'ProductosController@store');

//Actualizar un producto
Route::middleware('cors')->put('/productos/{id}', 'ProductosController@update');

//Subir un fichero o imagen a un producto
Route::middleware('cors')->post('/upload-file', 'ProductosController@upload');

//Eliminar un producto
Route::middleware('cors')->delete('/productos/{id}', 'ProductosController@delete');