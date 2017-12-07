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
        return response()->json(['data'=> $producto, 'code' => 200] , 200);
        //Aquí manejaremos el error de alguna manera, mientras:
        return response()->json(['data'=> 'Producto no encontrado', 'code' => 404] , 404);
        // return Producto::findOrFail($id);
        
        //Esta otra también sería válida
        // return Producto::where('id', $id)->get();   

    }

    public function store(Request $request){
        $producto = new Producto();
        $producto->id = $request->input('id');
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->imagen = $request->input('imagen');
        $producto->save();
        return response()->json(['Producto'=> $producto, 'code' => 201] , 201);
    }
    public function update(Request $request, $id){
        Producto::unguard();
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        Producto::reguard();
        return response()->json(['data' => $producto, 'code' => 200], 200);
    }
    
    public function upload(Request $request){

        if ($request->file('uploads')){ 
            $file = $request->file('uploads')->store('uploads/imagenes');
            $name = substr($file, 17);
        
        $result = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'Archivo subido correctamente',
                'filename' => $name,
                'ruta' => $file
                );
            }else{
            $result = array(
                'status' => 'error',
                'code' => 501,
                'message' => 'No se ha podido subir la imagen'
                );
        }
        
        return response()->json($result);
    }

    public function delete($id){
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(['message'=> 'producto borrado', 'code'=> 200], 200);
    }
}