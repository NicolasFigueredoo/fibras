<?php

namespace App\Http\Controllers;

use App\Models\Aplicacion;
use App\Models\Banner;
use App\Models\Categoria;
use App\Models\ClienteEmpresa;
use App\Models\Contacto;
use App\Models\Idioma;
use App\Models\Logo;
use App\Models\Novedad;
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

        $idioma = Idioma::where('activo', 1)->first();
        $idiomas = Idioma::all();


        if($idioma['idioma'] == 'ES'){
            $tituloSeccionProductos = 'Productos';
            $tituloSeccionNovedades = 'novedades';
            $textoBoton = 'Ver todos';
            $textoBotonNovedad = 'Ver todas';
            $idiomaActive = 'ES';

            $opcionesNavegador = [
                ['name' => 'Nosotros', 'url' => route('nosotros')],
                ['name' => 'Productos', 'url' => route('productos')],
                ['name' => 'Aplicaciones', 'url' => route('aplicaciones')],  
                ['name' => 'Novedades', 'url' => route('novedades')], 
                ['name' => 'Solicitud de presupuesto', 'url' => route('presupuesto')],  
                ['name' => 'Contacto', 'url' => route('contacto')],
            ];
        }else{
            $tituloSeccionProductos = 'Produtos';
            $tituloSeccionNovedades = 'Novidades';
            $textoBotonNovedad = 'Ver tudo';
            $textoBoton = 'Ver tudo';
            $idiomaActive = 'POR';


            $opcionesNavegador = [
                ['name' => 'Sobre nós', 'url' => route('nosotros')],
                ['name' => 'Produtos', 'url' => route('productos')],
                ['name' => 'Aplicações', 'url' => route('aplicaciones')],  
                ['name' => 'Novidades', 'url' => route('novedades')], 
                ['name' => 'Solicitação de orçamento', 'url' => route('presupuesto')], 
                ['name' => 'Contato', 'url' => route('contacto')],
        
            ];
        }

        $sliders = Slider::orderBy('orden')->where('seccion', 'home')->get();
        $logo = Logo::all();
        $categorias = Categoria::where('destacado', 1)
        ->orderBy('orden')
        ->get();
        $seccion = Banner::where('seccion','home')->get();
        $novedades = Novedad::orderBy('orden')->get();
        $productos = Producto::with('categorias')->get();


        foreach ($sliders as $slider) {
            $imagenPath = $slider->imagen;
            $extension = pathinfo($imagenPath, PATHINFO_EXTENSION);
            $validImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $validVideoExtensions = ['mp4', 'avi', 'mov', 'wmv'];
    
            if (in_array($extension, $validImageExtensions)) {
                $slider->contentType = 'imagen';
            }
            elseif (in_array($extension, $validVideoExtensions)) {
                $slider->contentType = 'video';
            }
            else {
                $slider->contentType = null;
            }
        }

        return view('home', compact('sliders', 'logo', 'categorias', 'seccion', 'novedades', 'tituloSeccionProductos', 'opcionesNavegador', 'idiomaActive', 'tituloSeccionNovedades', 'textoBoton', 'idiomas', 'productos', 'textoBotonNovedad'));
    }

    public function nosotros()
    {

        $seccion = Banner::where('seccion','nosotros')->get();
        $idioma = Idioma::where('activo', 1)->first();
        $logo = Logo::all();
        $sliders = Slider::orderBy('orden')->where('seccion', 'nosotros')->get();
        $idiomas = Idioma::all();
        $servicios = Valores::orderBy('orden')->get();
        $currentRoute = url()->current();
        $productos = Producto::with('categorias')->get();


        foreach ($sliders as $slider) {
            $imagenPath = $slider->imagen;
            $extension = pathinfo($imagenPath, PATHINFO_EXTENSION);
            $validImageExtensions = ['jpg', 'jpeg', 'png', 'gif','webp'];
            $validVideoExtensions = ['mp4', 'avi', 'mov', 'wmv'];
    
            if (in_array($extension, $validImageExtensions)) {
                $slider->contentType = 'imagen';
            }
            elseif (in_array($extension, $validVideoExtensions)) {
                $slider->contentType = 'video';
            }
            else {
                $slider->contentType = null;
            }
        }

        if($idioma['idioma'] == 'ES'){

            $idiomaActive = 'ES';

            $opcionesNavegador = [
                ['name' => 'Nosotros', 'url' => route('nosotros')],
                ['name' => 'Productos', 'url' => route('productos')],
                ['name' => 'Aplicaciones', 'url' => route('aplicaciones')],  
                ['name' => 'Novedades', 'url' => route('novedades')], 
                ['name' => 'Solicitud de presupuesto', 'url' => route('presupuesto')],  
                ['name' => 'Contacto', 'url' => route('contacto')],
            ];
        }else{
       
            $idiomaActive = 'POR';


            $opcionesNavegador = [
                ['name' => 'Sobre nós', 'url' => route('nosotros')],
                ['name' => 'Produtos', 'url' => route('productos')],
                ['name' => 'Aplicações', 'url' => route('aplicaciones')],  
                ['name' => 'Novidades', 'url' => route('novedades')], 
                ['name' => 'Solicitação de orçamento', 'url' => route('presupuesto')], 
                ['name' => 'Contato', 'url' => route('contacto')],
        
            ];
        }

        
        foreach ($opcionesNavegador as &$option) {
            $option['active'] = ($option['url'] === $currentRoute);
        }

        return view('nosotros',compact('seccion', 'servicios', 'sliders', 'idioma', 'logo', 'idiomas', 'opcionesNavegador', 'idiomaActive', 'servicios', 'productos'));

    }

    
    public function productos()
    {
        $idioma = Idioma::where('activo', 1)->first();
        if($idioma['idioma'] == 'ES'){
            $idiomaActive = 'ES';
            
        }else{
            $idiomaActive = 'POR';

        }
        $categorias = Categoria::orderBy('orden')->get();
        return view('productos', compact('categorias', 'idiomaActive'));
    }

    public function aplicaciones(){

        $idioma = Idioma::where('activo', 1)->first();

        if($idioma['idioma']  == 'ES'){
            $idiomaActive = 'ES';

        }else{
            $idiomaActive = 'POR';

        }
    
        $aplicaciones = Aplicacion::
        orderBy('orden')
        ->get();
        return view('aplicaciones', compact('aplicaciones', 'idiomaActive'));
    }

    public function novedades()
    {
        $idioma = Idioma::where('activo', 1)->first();

        if($idioma['idioma']  == 'ES'){
            $idiomaActive = 'ES';

        }else{
            $idiomaActive = 'POR';
        }
        $novedades = Novedad::orderBy('orden')->get();
        
        return view('novedades', compact('novedades', 'idiomaActive'));
    }

    public function mostrarNovedad($Idnovedad){
        $novedad = Novedad::find($Idnovedad);
        $idioma = Idioma::where('activo', 1)->first();

        if($idioma['idioma']  == 'ES'){
            $idiomaActive = 'ES';

        }else{
            $idiomaActive = 'POR';
        }
        
        return view('verNovedad', compact('novedad', 'idiomaActive'));
        
    }

    

    public function presupuesto()
    {
    
        $idioma = Idioma::where('activo', 1)->first();

        if($idioma['idioma']  == 'ES'){
            $idiomaActive = 'ES';

        }else{
            $idiomaActive = 'POR';
        }        
        return view('presupuesto', compact('idiomaActive'));
    }

    public function calidad()
    {
    
        $seccion = Banner::where('seccion','calidad')->get();
        
        return view('calidad', compact('seccion'));
    }

    public function contacto()
    {
        $idioma = Idioma::where('activo', 1)->first();
        if($idioma['idioma'] == 'ES'){
            $idiomaActive = 'ES';
            
        }else{
            $idiomaActive = 'POR';

        }
        return view('contacto', compact('idiomaActive'));
    }


    public function mostrarProductosCategoria($id, $idProducto){
    
        $producto = Producto::find($idProducto);

        $idioma = Idioma::where('activo', 1)->first();
        if($idioma['idioma'] == 'ES'){
            $idiomaActive = 'ES';
            
        }else{
            $idiomaActive = 'POR';

        }

        if($producto !== null){
            $producto = Producto::find($idProducto);
            $categorias = Categoria::orderBy('orden')->get();
            $categoria = Categoria::find($id);
            $productos = $categoria->productos;
            $imagenes = $producto->imagenes->sortBy('orden');

            return view('categoriasProducto', compact('categoria', 'producto', 'categorias', 'productos', 'imagenes', 'idiomaActive'));
        }else{
            $categoria = Categoria::find($id);
            $categorias = Categoria::orderBy('orden')->get();
            
            $productos = $categoria->productos()->with('imagenes')->get();

            if (!$categoria) {
                abort(404);
            }
            return view('categoriasProducto', compact('categoria', 'productos', 'categorias', 'producto', 'idiomaActive'));
        }
    }

    public function obtenerNumeroWhatsApp()
    {
        $contacto = Contacto::all();
        $numeroWhatsApp = preg_replace('/[^\d]/', '', $contacto[0]['telefono']);

        return $numeroWhatsApp;
    }

    public function changeIdioma(Request $request){
        $idiomaId = $request->input('idioma');
        $idioma = Idioma::where('activo', 1)->first();
        $idioma->activo = 0;
        $idioma->save();

        $idiomaActive = Idioma::find($idiomaId);
        $idiomaActive->activo = 1;
        $idiomaActive->save();

        return response()->json(['success' => true]);
        

    }



    
}
