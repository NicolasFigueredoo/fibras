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
        }])->with(['litros' => function ($query) {
            $query->orderBy('cantidad', 'asc');
        }])->orderBy('orden', 'asc')->get();
        return response()->json($productos);
    }

    public function crearProducto(Request $request)
    {
        $producto = new Producto();
        $producto->orden = $request->orden;
        $producto->nombre = $request->nombre;
        $producto->texto = $request->texto;

        if ($request->hasFile('hojaSeguridad')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('hojaSeguridad')->store('fotos');
            $producto->hojaseguridad = $photoPath;
        }else{
            $producto->hojaseguridad = 'none';
 
        }

        if ($request->hasFile('fichaTecnica')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('fichaTecnica')->store('fotos');
            $producto->fichatecnica = $photoPath;
        }
        else{
            $producto->fichatecnica = 'none';

        }
        $producto->save();


        if($request->categorias){
            $categoriasIds = array_map(function($categoria) {
                return $categoria['id'];
            }, $request->categorias);
        
            $producto->categorias()->sync($categoriasIds);
        }
        
        if($request->litros){
            $litrosIds = array_map(function($litro) {
                return $litro['id'];
            }, $request->litros);
        
            $producto->litros()->sync($litrosIds);
        }
        
        

        return response()->json($request);
    }

    public function updateProducto(Request $request)
    {
        $producto = Producto::find($request->idProducto);
        $producto->orden = $request->orden;
        $producto->nombre = $request->nombre;
        $producto->texto = $request->texto;
        
        if ($request->hasFile('hojaSeguridad')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('hojaSeguridad')->store('fotos');
            $producto->hojaseguridad = $photoPath;
        }


        if ($request->hasFile('fichaTecnica')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('fichaTecnica')->store('fotos');
            $producto->fichatecnica = $photoPath;
        }


        $producto->save();
        
        if($request->categorias){
            $categoriasIds = array_map(function($categoria) {
                return $categoria['id'];
            }, $request->categorias);
        
            $producto->categorias()->sync($categoriasIds);
        }
        
        if($request->litros){
            $litrosIds = array_map(function($litro) {
                return $litro['id'];
            }, $request->litros);
        
            $producto->litros()->sync($litrosIds);
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
        }])
        ->with(['litros' => function ($query) {
            $query->orderBy('cantidad', 'asc');
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
