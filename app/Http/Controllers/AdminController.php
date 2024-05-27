<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Catalogo;
use App\Models\Categoria;
use App\Models\CategoriaHome;
use App\Models\ClienteEmpresa;
use App\Models\Contacto;
use App\Models\Descarga;
use App\Models\Feria;
use App\Models\ImagenesFeria;
use App\Models\Litro;
use App\Models\Logo;
use App\Models\MetaDatos;
use App\Models\Novedad;
use App\Models\Seccion;
use App\Models\Sector;
use App\Models\Servicio;
use App\Models\Slider;
use App\Models\Suscripcion;
use App\Models\Valores;
use App\Models\Video;
use App\Models\ZonaPrivada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //Sliders HOME
    public function obtenerSliders()
    {
        $sliders = Slider::orderBy('orden', 'asc')->get();

        return response()->json($sliders);
    }

    public function updateSlider(Request $request)
    {
        $slider = Slider::find($request->idSlider);
        $slider->orden = $request->orden;
        $slider->texto = $request->jsonCodigoSlider;
        $slider->textoboton = $request->textoboton;
        $slider->linkboton = $request->linkboton;

        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $slider->imagen = $photoPath;
        }

        $slider->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    public function deleteSlider(Request $request)
    {
        $slider = Slider::find($request->idSlider);
        $slider->delete();

        return response()->json(['message' => 'Producto Eliminada'], 200);
    }

    public function crearSlider(Request $request)
    {
        $slider = new Slider();
        $slider->orden = $request->orden;
        $slider->texto = $request->jsonCodigoSlider;
        $slider->textoboton = $request->textoboton;
        $slider->linkboton = $request->linkboton;

        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $slider->imagen = $photoPath;
        }

        $slider->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    public function obtenerSlider($idSlider)
    {
        $slider = Slider::find($idSlider);
        return response()->json($slider);
    }


    //CONTACTO
    public function updateContacto(Request $request)
    {
        $contacto = Contacto::first();
        $contacto->direccion = $request->direccion;
        $contacto->email = $request->email;
        $contacto->telefono = $request->telefono;
        $contacto->telefono_secundario = $request->telefono2;
        $contacto->instagram = $request->instagram;

        $contacto->save();

        return response()->json(['message' => 'Contacto actualizado con exito'], 200);
    }

    public function obtenerContacto()
    {
        $contacto = Contacto::all();

        return response()->json($contacto);
    }

    //LOGO
    public function obtenerLogos()
    {
        $logos = Logo::first();
        return response()->json($logos);
    }

    public function updateLogo(Request $request)
    {

        $logo = Logo::first();

        if ($request->hasFile('logoNav')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('logoNav')->store('fotos');
            $logo->navbar = $photoPath;
        }

        if ($request->hasFile('logoFooter')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('logoFooter')->store('fotos');
            $logo->footer = $photoPath;
        }

        if ($request->hasFile('header')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('header')->store('fotos');
            $logo->header = $photoPath;
        }

        $logo->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    //OBTENER BANNER
    public function obtenerBanner()
    {
        $banners = Banner::all();
        return response()->json($banners);
    }

    public function updateBanner(Request $request)
    {
        $banner = Banner::find($request->idBanner);
        $banner->titulo = $request->bannerTitulo;
        $banner->texto = $request->bannerTexto;
      

        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $banner->imagen = $photoPath;
        }

        if ($request->hasFile('txtBoton')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('txtBoton')->store('fotos');
            $banner->textoboton = $photoPath;
        }

        if ($request->hasFile('linkBoton')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('linkBoton')->store('fotos');
            $banner->link = $photoPath;
        }

        $banner->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    //NOVEDADES
    public function obtenerNovedades()
    {
        $novedades = Novedad::orderBy('orden', 'asc')->get();
        return response()->json($novedades);
    }

    public function obtenerNovedad($idNovedad)
    {
        $novedad = Novedad::find($idNovedad);
        return response()->json($novedad);
    }

    public function crearNovedad(Request $request)
    {
        $novedad = new Novedad();
        $novedad->orden = $request->orden;
        $novedad->titulo = $request->titulo;
        $novedad->epigrafe = $request->epigrafe;
        $novedad->etiqueta = $request->etiqueta;
        $novedad->destacado = $request->destacado;

        $novedad->texto = $request->texto;
        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $novedad->imagen = $photoPath;
        }

        $novedad->save();


        return response()->json($novedad);
    }

    public function updateNovedad(Request $request)
    {
        $novedad = Novedad::find($request->idNovedad);
        $novedad->orden = $request->orden;
        $novedad->titulo = $request->titulo;
        $novedad->epigrafe = $request->epigrafe;
        $novedad->etiqueta = $request->etiqueta;
        $novedad->destacado = $request->destacado;

        $novedad->texto = $request->texto;
        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $novedad->imagen = $photoPath;
        }

        $novedad->save();


        return response()->json($novedad);
    }

    public function deleteNovedad(Request $request)
    {
        $novedad = Novedad::find($request->idNovedad);
        $novedad->delete();
        return response()->json($novedad);
    }


    //FERIAS
    public function obtenerFerias()
    {
        $ferias = Feria::with(['imagenes' => function ($query) {
            $query->orderBy('orden', 'asc');
        }])->orderBy('orden', 'asc')->get();;
        return response()->json($ferias);
    }

    public function obtenerFeria($idFeria)
    {
        $feria = Feria::with(['imagenes' => function ($query) {
            $query->orderBy('orden', 'asc');
        }])->find($idFeria);

        return response()->json($feria);
    }

    public function crearFeria(Request $request)
    {
        $feria = new Feria();
        $feria->orden = $request->orden;
        $feria->titulo = $request->titulo;
        $feria->epigrafe = $request->epigrafe;
        $feria->etiqueta = $request->etiqueta;
        $feria->destacado = $request->destacado;

        $feria->texto = $request->texto;
        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $feria->imagen = $photoPath;
        }

        $feria->save();


        return response()->json($feria);
    }

    public function updateFeria(Request $request)
    {
        $feria = Feria::find($request->idFeria);
        $feria->orden = $request->orden;
        $feria->titulo = $request->titulo;
        $feria->epigrafe = $request->epigrafe;
        $feria->etiqueta = $request->etiqueta;
        $feria->destacado = $request->destacado;

        $feria->save();


        return response()->json($feria);
    }

    public function deleteFeria(Request $request)
    {
        $feria = Feria::find($request->idFeria);
        $feria->delete();
        return response()->json($feria);
    }

    public function guardarImagenFeria(Request $request)
    {

        $imagenFeria = new ImagenesFeria();
        $imagenFeria->id_feria = $request->idFeria;
        $imagenFeria->orden = $request->orden;


        if ($request->hasFile('imagen')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('imagen')->store('fotos');
            $imagenFeria->path = $photoPath;
        }

        $imagenFeria->save();
    }

    public function eliminarImagenFeria(Request $request)
    {
        $imagen = ImagenesFeria::find($request->idImagen);
        $imagen->delete();
        return response()->json($imagen);
    }

    //SERVICIOS
    public function obtenerServicios()
    {
        $servicios = Servicio::orderBy('orden', 'asc')->get();
        return response()->json($servicios);
    }

    public function obtenerServicio($idServicio)
    {
        $servicio = Servicio::find($idServicio);
        return response()->json($servicio);
    }

    public function crearServicio(Request $request)
    {
        $servicio = new Servicio();
        $servicio->orden = $request->orden;
        $servicio->titulo = $request->titulo;
        $servicio->texto = $request->texto;
        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $servicio->imagen = $photoPath;
        }

        $servicio->save();

        return response()->json($servicio);
    }

    public function updateServicio(Request $request)
    {
        $servicio = Servicio::find($request->idServicio);
        $servicio->orden = $request->orden;
        $servicio->titulo = $request->titulo;
        $servicio->texto = $request->texto;

        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $servicio->imagen = $photoPath;
        }

        $servicio->save();

        return response()->json($servicio);
    }

    public function deleteServicio(Request $request)
    {
        $servicio = Servicio::find($request->idServicio);
        $servicio->delete();
        return response()->json($servicio);
    }

    //DESCARGAS

    public function descargarArchive($idArchivo)
    {
        $archivo = Descarga::find($idArchivo);

        if (!$archivo) {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }

        $rutaArchivo = $archivo->file;
        $tipoMime = Storage::mimeType($rutaArchivo);

        if (Storage::exists($rutaArchivo)) {
            return response()->file(storage_path('app/' . $rutaArchivo), ['Content-Type' => $tipoMime]);
        } else {
            return response()->json(['error' => 'El archivo no existe'], 404);
        }
    }

    public function obtenerDescargas()
    {
        $descargas = Descarga::orderBy('orden', 'asc')->get();
        return response()->json($descargas);
    }

    public function obtenerDescarga($idDescarga)
    {
        $descarga = Descarga::find($idDescarga);
        return response()->json($descarga);
    }

    public function crearDescarga(Request $request)
    {
        $descarga = new Descarga();
        $descarga->orden = $request->orden;
        $descarga->titulo = $request->titulo;
        if ($request->hasFile('file')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('file')->store('fotos');
            $descarga->file = $photoPath;
        }

        $descarga->save();

        return response()->json($descarga);
    }

    public function updateDescarga(Request $request)
    {
        $descarga = Descarga::find($request->idDescarga);
        $descarga->orden = $request->orden;
        $descarga->titulo = $request->titulo;
        if ($request->hasFile('file')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('file')->store('fotos');
            $descarga->file = $photoPath;
        }

        $descarga->save();

        return response()->json($descarga);
    }

    public function deleteDescarga(Request $request)
    {
        $descarga = Descarga::find($request->idDescarga);
        $descarga->delete();
        return response()->json($descarga);
    }

    //VALORES
    public function obtenerSecciones()
    {
        $secciones = Valores::orderBy('orden', 'asc')->get();
        return response()->json($secciones);
    }

    public function obtenerSeccion($idSeccion)
    {
        $seccion = Valores::find($idSeccion);
        return response()->json($seccion);
    }

    public function updateSeccion(Request $request)
    {
        $seccion = Valores::find($request->idSeccion);
        $seccion->orden = $request->orden;
        $seccion->titulo = $request->titulo;
        $seccion->texto = $request->texto;
        if ($request->hasFile('imagen')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('imagen')->store('fotos');
            $seccion->imagen = $photoPath;
        }
        $seccion->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    public function deleteSeccion(Request $request)
    {
        $seccion = Valores::find($request->idValor);
        $seccion->delete();

        return response()->json(['message' => 'Valor Eliminado'], 200);
    }

    public function crearSeccion(Request $request)
    {
        $seccion = new Valores();
        $seccion->orden = $request->orden;
        $seccion->titulo = $request->titulo;
        $seccion->texto = $request->texto;
        if ($request->hasFile('imagen')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('imagen')->store('fotos');
            $seccion->imagen = $photoPath;
        }


        $seccion->save();

        return response()->json(['message' => 'Datos subidos correctamente'], 200);
    }

    //VIDEOS
    public function obtenerVideos()
    {
        $videos = Video::orderBy('orden', 'asc')->get();
        return response()->json($videos);
    }

    public function obtenerVideo($idVideo)
    {
        $video = Video::find($idVideo);
        return response()->json($video);
    }

    public function crearvideo(Request $request)
    {
        $video = new Video();
        $video->orden = $request->orden;
        $video->titulo = $request->titulo;
        if ($request->link) {
            $video->link = $request->link;
        } else {
            $video->link = null;
        }
        if ($request->hasFile('file')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('file')->store('fotos');
            $video->file = $photoPath;
        } else {
            $video->file = null;
        }

        $video->save();

        return response()->json($video);
    }

    public function updateVideo(Request $request)
    {
        $video = Video::find($request->idVideo);
        $video->orden = $request->orden;
        $video->titulo = $request->titulo;
        if ($request->link) {
            $video->link = $request->link;
        } else {
            $video->link = null;
        }
        if ($request->hasFile('file')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('file')->store('fotos');
            $video->file = $photoPath;
        } else {
            $video->file = null;
        }

        $video->save();

        return response()->json($video);
    }

    public function deleteVideo(Request $request)
    {
        $video = Video::find($request->idVideo);
        $video->delete();
        return response()->json($video);
    }

    //METADATOS

    public function obtenerMetadatos()
    {
        $metadatos = MetaDatos::all();
        return response()->json($metadatos);
    }

    public function obtenerMetadato($idMetadato)
    {
        $metadato = MetaDatos::find($idMetadato);
        return response()->json($metadato);
    }

    public function updateMetadato(Request $request)
    {
        $metadatos = MetaDatos::all();
        foreach ($metadatos as $meta) {
            $metadato = MetaDatos::find($meta['id']);
            $metadato->claves = $request->claves;
            $metadato->save();
        }

        return response()->json($metadatos);
    }

    //ZONA PRIVADA
    public function obtenerFileZonas()
    {
        $descargas = ZonaPrivada::orderBy('orden', 'asc')->get();
        return response()->json($descargas);
    }

    public function obtenerFileZona($idFileZona)
    {
        $descarga = ZonaPrivada::find($idFileZona);
        return response()->json($descarga);
    }

    public function crearFileZona(Request $request)
    {
        $descarga = new ZonaPrivada();
        $descarga->orden = $request->orden;
        $descarga->numeropedido = $request->Npedido;


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $formato = $file->getClientOriginalExtension();
            $pesoEnBytes = $file->getSize();
            $pesoEnKb = $pesoEnBytes / 1024;

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('file')->store('fotos');
            $descarga->file = $photoPath;
            $descarga->formato = $formato;
            $descarga->peso = $pesoEnKb;
        }

        $descarga->save();

        return response()->json($descarga);
    }

    public function updateFileZona(Request $request)
    {
        $descarga = ZonaPrivada::find($request->idFileZona);
        $descarga->orden = $request->orden;
        $descarga->numeropedido = $request->Npedido;


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $formato = $file->getClientOriginalExtension();
            $pesoEnBytes = $file->getSize();
            $pesoEnKb = $pesoEnBytes / 1024;

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('file')->store('fotos');
            $descarga->file = $photoPath;
            $descarga->formato = $formato;
            $descarga->peso = $pesoEnKb;
        }

        $descarga->save();

        return response()->json($descarga);
    }

    public function deleteFileZona(Request $request)
    {
        $descarga = ZonaPrivada::find($request->idFileZona);
        $descarga->delete();
        return response()->json($descarga);
    }

    public function descargarArchiveZona($idArchivo)
    {
        $archivo = ZonaPrivada::find($idArchivo);

        if (!$archivo) {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }

        $rutaArchivo = $archivo->file;
        $tipoMime = Storage::mimeType($rutaArchivo);

        if (Storage::exists($rutaArchivo)) {
            return response()->file(storage_path('app/' . $rutaArchivo), ['Content-Type' => $tipoMime]);
        } else {
            return response()->json(['error' => 'El archivo no existe'], 404);
        }
    }

    public function obtenerZona($idZona)
    {
        $catalogo = ZonaPrivada::find($idZona);
        $rutaArchivo = $catalogo->file;

        if (Storage::exists($rutaArchivo)) {
            $tipoMime = Storage::mimeType($rutaArchivo);

            return response()->file(storage_path('app/' . $rutaArchivo), ['Content-Type' => $tipoMime]);
        } else {
            return response()->json(['error' => 'El archivo no existe'], 404);
        }
    }


    //CATEGORIAS
    public function obtenerCategorias()
    {
        $categorias = Categoria::orderBy('orden', 'asc')->get();
        return response()->json($categorias);
    }

    public function obtenerCategoria($idCategoria)
    {
        $servicio = Categoria::find($idCategoria);
        return response()->json($servicio);
    }

    public function crearCategoria(Request $request)
    {
        $categoria = new Categoria();
        $categoria->orden = $request->orden;
        $categoria->nombre = $request->titulo;
        $categoria->destacado = $request->destacado;

        $categoria->save();

        return response()->json($categoria);
    }

    public function updateCategoria(Request $request)
    {
        $categoria = Categoria::find($request->idCategoria);
        $categoria->orden = $request->orden;
        $categoria->nombre = $request->titulo;
        $categoria->destacado = $request->destacado;
        $categoria->save();

        return response()->json($categoria);
    }

    public function deleteCategoria(Request $request)
    {
        $categoria = Categoria::find($request->idCategoria);
        $categoria->delete();
        return response()->json($categoria);
    }


    //SECTORES
    public function obtenerSectores()
    {
        $sectores = Sector::orderBy('orden', 'asc')->get();
        return response()->json($sectores);
    }

    public function obtenerSector($idSector)
    {
        $sector = Sector::find($idSector);
        return response()->json($sector);
    }

    public function crearSector(Request $request)
    {
        $sector = new Sector();
        $sector->orden = $request->orden;
        $sector->titulo = $request->titulo;
        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $sector->imagen = $photoPath;
        }

        $sector->save();

        return response()->json($sector);
    }

    public function updateSector(Request $request)
    {
        $sector = Sector::find($request->idSector);
        $sector->orden = $request->orden;
        $sector->titulo = $request->titulo;

        if ($request->hasFile('foto')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('foto')->store('fotos');
            $sector->imagen = $photoPath;
        }

        $sector->save();

        return response()->json($sector);
    }

    public function deleteSector(Request $request)
    {
        $sector = Sector::find($request->idSector);
        $sector->delete();
        return response()->json($sector);
    }

    //Litros
    public function obtenerLitros()
    {
        $litros = Litro::orderBy('cantidad', 'asc')->get();
        return response()->json($litros);
    }

    public function obtenerLitro($idLitro)
    {
        $litro = Litro::find($idLitro);
        return response()->json($litro);
    }

    public function crearLitro(Request $request)
    {
        $litro = new Litro();
        $litro->orden = $request->orden;
        $litro->cantidad = $request->cantidad;
        if ($request->hasFile('imagen')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('imagen')->store('fotos');
            $litro->imagen = $photoPath;
        }

        $litro->save();

        return response()->json($litro);
    }

    public function updateLitro(Request $request)
    {
        $litro = Litro::find($request->idLitro);
        $litro->orden = $request->orden;
        $litro->cantidad = $request->cantidad;
        if ($request->hasFile('imagen')) {

            if (!Storage::exists('public/fotos')) {
                Storage::makeDirectory('public/fotos');
            }

            $photoPath = $request->file('imagen')->store('fotos');
            $litro->imagen = $photoPath;
        }

        $litro->save();

        return response()->json($litro);
    }

    public function deleteLitro(Request $request)
    {
        $litro = Litro::find($request->idLitro);
        $litro->delete();
        return response()->json($litro);
    }

     //CLIENTES EMPRESAS
     public function obtenerClientesEmpresa()
     {
         $clientes = ClienteEmpresa::orderBy('orden', 'asc')->get();
         return response()->json($clientes);
     }
 
     public function obtenerClienteEmpresa($idCliente)
     {
         $cliente = ClienteEmpresa::find($idCliente);
         return response()->json($cliente);
     }
 
     public function crearClienteEmpresa(Request $request)
     {
         $clienteEmpresa = new ClienteEmpresa();
         $clienteEmpresa->orden = $request->orden;
         $clienteEmpresa->nombre = $request->titulo;
         $clienteEmpresa->link = $request->link;

         if ($request->hasFile('foto')) {
 
             if (!Storage::exists('public/fotos')) {
                 Storage::makeDirectory('public/fotos');
             }
 
             $photoPath = $request->file('foto')->store('fotos');
             $clienteEmpresa->imagen = $photoPath;
         }
 
         $clienteEmpresa->save();
 
         return response()->json($clienteEmpresa);
     }
 
     public function updateClienteEmpresa(Request $request)
     {
         $clienteEmpresa = ClienteEmpresa::find($request->idClienteEmpresa);
         $clienteEmpresa->orden = $request->orden;
         $clienteEmpresa->nombre = $request->titulo;
         $clienteEmpresa->link = $request->link;

         if ($request->hasFile('foto')) {
 
             if (!Storage::exists('public/fotos')) {
                 Storage::makeDirectory('public/fotos');
             }
 
             $photoPath = $request->file('foto')->store('fotos');
             $clienteEmpresa->imagen = $photoPath;
         }
 
         $clienteEmpresa->save();
 
         return response()->json($clienteEmpresa);
     }
 
     public function deleteClienteEmpresa(Request $request)
     {
         $clienteEmpresa = ClienteEmpresa::find($request->idClienteEmpresa);
         $clienteEmpresa->delete();
         return response()->json($clienteEmpresa);
     }
}
