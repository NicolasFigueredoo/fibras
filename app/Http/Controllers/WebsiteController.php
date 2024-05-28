<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Categoria;
use App\Models\ClienteEmpresa;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Producto;
use App\Models\Sector;
use App\Models\Servicio;
use App\Models\Slider;
use App\Models\Valores;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        $slider = Slider::all();
        $logo = Logo::all();
        $categorias = Categoria::where('destacado', 1)
        ->orderBy('orden')
        ->get();
        $seccion = Banner::where('seccion','home')->get();
        $sectores = Sector::orderBy('orden')->get();


        $contentType = 'imagen';
        if ($slider->isNotEmpty()) {
            $imagenPath = $slider[0]['imagen'];
            $extension = pathinfo($imagenPath, PATHINFO_EXTENSION);
            $validImageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $validVideoExtensions = ['mp4', 'avi', 'mov', 'wmv']; 

            if (in_array($extension, $validVideoExtensions)) {
                $contentType = 'video';
            }
        }

        return view('home', compact('slider', 'contentType', 'logo', 'categorias','seccion','sectores'));
    }

    public function nosotros()
    {

        $seccion = Banner::where('seccion','nosotros')->get();
        $servicios = Valores::all();

        return view('nosotros',compact('seccion', 'servicios'));

    }

    public function servicios(){
        $seccion = Banner::where('seccion','servicio1')->get();
        $seccion2 = Banner::where('seccion','servicio2')->get();

        $servicios = Servicio::all();

        return view('servicios',compact('seccion', 'servicios', 'seccion2'));
    }

    public function sectores()
    {
    
        $sectores = Sector::orderBy('orden')->get();
        
        return view('sectores', compact('sectores'));
    }

    public function clientes()
    {
    
        $clientes = ClienteEmpresa::orderBy('orden')->get();
        
        return view('clientes', compact('clientes'));
    }

    
    public function calidad()
    {
    
        $seccion = Banner::where('seccion','calidad')->get();
        
        return view('calidad', compact('seccion'));
    }

    public function contacto()
    {
            
        return view('contacto');
    }

    public function productos()
    {
        $categorias = Categoria::orderBy('orden')->get();
        return view('productos', compact('categorias'));
    }

    public function mostrarProductosCategoria($id, $idProducto){
    
        $producto = Producto::find($idProducto);

        if($producto){
            $producto = Producto::find($idProducto);
            $categorias = Categoria::orderBy('orden')->get();
            $categoria = Categoria::find($id);
            $productos = $categoria->productos;
            $imagenes = $producto->imagenes->sortBy('orden');
            $litros = $producto->litros->sortBy('cantidad');

            return view('categoriasProducto', compact('categoria', 'producto', 'categorias', 'productos', 'imagenes', 'litros'));
        }else{
            $categoria = Categoria::find($id);
            $categorias = Categoria::orderBy('orden')->get();
            $productos = $categoria->productos;
            if (!$categoria) {
                abort(404);
            }
            return view('categoriasProducto', compact('categoria', 'productos', 'categorias', 'producto',));
        }
    }

    public function obtenerNumeroWhatsApp()
    {
        $contacto = Contacto::all();
        $numeroWhatsApp = preg_replace('/[^\d]/', '', $contacto[0]['telefono']);

        return $numeroWhatsApp;
    }

    
}
