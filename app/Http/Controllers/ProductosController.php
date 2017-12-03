<?php

namespace App\Http\Controllers;

//Importamos el modelo
use App\Producto;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index() {
        return Producto::all();

        //Esta otra también sería válida
        // return response()-> json(\App\Producto::all());
    }

    public function show($id) {

        if($producto = Producto::find($id))
            return $producto;
        //Aquí manejaremos el error de alguna manera, mientras:
        return response()->json('Producto no encontrado', 404);
        // return Producto::findOrFail($id);
        
        //Esta otra también sería válida
        // return Producto::where('id', $id)->get();   

    }

    public function store(Request $request){
        Producto::unguard();
        $producto = Producto::create($request->all());
        Producto::reguard();
        return response()->json($producto, 201);
    }

    public function update(Request $request, $id){
        Producto::unguard();
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        Producto::reguard();
        return response()->json($producto, 200);
    }

    public function upload(Request $request){
        if($request->file_exists)
        $file = $request->file('foto')->store('foto');
        
        return "archivo guardado";
       
    }
    public function delete($id){
        $producto = Producto::findOrFail($id);
        $producto->delete();
        
        return response()->json(null, 204);
    }
}