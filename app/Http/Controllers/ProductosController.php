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
        $productos = Producto::with(['imagenes' => function ($query) {
            $query->orderBy('orden', 'asc');
        }])->with(['SubProductos' => function ($query) {
            $query->orderBy('codigo', 'asc');
        }])->orderBy('orden', 'asc')->get();
        return response()->json($productos);
    }

    public function crearProducto(Request $request)
    {
        $producto = new Producto();
        $producto->orden = $request->orden;
        $producto->nombre = $request->nombre;
        $producto->texto = $request->texto;
        $producto->destacado = $request->destacado;
        $producto->save();


        if($request->subproductos){
            foreach ($request->subproductos as $subProductoJson) {
                $subProducto = new SubProducto();
                $subProducto->producto_id = $producto->id;
                $subProducto->codigo = $subProductoJson['codigo'];
                $subProducto->tamaño = $subProductoJson['tamaño'];
                $subProducto->pack = $subProductoJson['pack'];
                $subProducto->codigobarra = $subProductoJson['codigobarra'];
                $subProducto->save();
            }
        }
        
        

        return response()->json($request);
    }

    public function updateProducto(Request $request)
    {
        $producto = Producto::find($request->idProducto);
        $producto->orden = $request->orden;
        $producto->nombre = $request->nombre;
        $producto->texto = $request->texto;
        $producto->destacado = $request->destacado;
        $producto->save();
        
        foreach ($producto->subproductos as $subProductoJson) {
            $subProducto = SubProducto::find($subProductoJson['id']);
            $subProducto->delete();
        }

        foreach ($request->subproductos as $subProductoJson) {
            $subProducto = new SubProducto();
            $subProducto->producto_id = $producto->id;
            $subProducto->codigo = $subProductoJson['codigo'];
            $subProducto->tamaño = $subProductoJson['tamaño'];
            $subProducto->pack = $subProductoJson['pack'];
            $subProducto->codigobarra = $subProductoJson['codigobarra'];
            $subProducto->save();
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
        $producto = Producto::with(['imagenes' => function ($query) {
            $query->orderBy('orden', 'asc');
        }])->with(['SubProductos' => function ($query) {
            $query->orderBy('codigo', 'asc');
        }])->find($idProducto);
        

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
