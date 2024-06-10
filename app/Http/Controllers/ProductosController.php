<?php

namespace App\Http\Controllers;

use App\Models\Imagenes;
use App\Models\Producto;
use App\Models\SubProducto;
use Dotenv\Util\Regex;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

class ProductosController extends Controller
{

    public function index()
    {
        $productos = Producto::with(['categorias' => function ($query) {
            $query->orderBy('orden', 'asc');
        }])->with(['imagenes' => function ($query) {
            $query->orderBy('orden', 'asc');
        }])->orderBy('orden', 'asc')->get();
        return response()->json($productos);
    }

    public function crearProducto(Request $request)
    {
        $producto = new Producto();
        $producto->orden = $request->orden;
        $producto->nombre = $request->nombre;
        $producto->texto = $request->texto;
        $producto->nombreAlternativo = $request->nombreAlternativo;
        $producto->textoAlternativo = $request->textoAlternativo;

        $producto->save();


        if($request->categorias){
            $categoriasIds = array_map(function($categoria) {
                return $categoria['id'];
            }, $request->categorias);
        
            $producto->categorias()->sync($categoriasIds);
        }
        
        return response()->json($request);
    }

    public function updateProducto(Request $request)
    {
        $producto = Producto::find($request->idProducto);
        $producto->orden = $request->orden;
        $producto->nombre = $request->nombre;
        $producto->texto = $request->texto;
        $producto->nombreAlternativo = $request->nombreAlternativo;
        $producto->textoAlternativo = $request->textoAlternativo;
    
        $producto->save();
        
        if($request->categorias){
            $categoriasIds = array_map(function($categoria) {
                return $categoria['id'];
            }, $request->categorias);
        
            $producto->categorias()->sync($categoriasIds);
        }
        
   
        
        

        return response()->json($request);
    }

    public function deleteProducto(Request $request)
    {
        $producto = Producto::find($request->idProducto);
        $producto->delete();
        return response()->json($producto);
    }

    public function obtenerProducto($idProducto)
    {
        
        $producto = Producto::with(['categorias' => function ($query) {
            $query->orderBy('orden', 'asc');
        }])
        ->with(['imagenes' => function ($query) {
            $query->orderBy('orden', 'asc');
        }])->find($idProducto);;

        return response()->json($producto);
    }

    public function guardarImagenProducto(Request $request)
    {

        $imagenProducto = new Imagenes();
        $imagenProducto->id_producto = $request->idProducto;
        $imagenProducto->orden = $request->orden;


        if ($request->hasFile('imagen')) {
          
            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }
        
            $photoPath = $request->file('imagen')->store('fotos');
            $imagenProducto->path = $photoPath;
        }

        $imagenProducto->save();
    }

    public function eliminarImagen(Request $request){
        $imagen = Imagenes::find($request->idImagen);
        $imagen->delete();
        return response()->json($imagen);
    }

}
