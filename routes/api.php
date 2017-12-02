<?php

use Illuminate\Http\Request;

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
Route::get('/productos', function (){
    return response()-> json(\App\Producto::all());
});

//Devolver un solo producto


//Eliminar un producto


//Actualizar un producto


//Subir un fichero o imagen a un producto