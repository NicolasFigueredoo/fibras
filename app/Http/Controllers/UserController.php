<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function verify(Request $request)
    {
        $usuario = $request->usuario;
        $contraseña = $request->contraseña;

        $user = Usuario::where('usuario', $usuario)->first();

        if ($user) {
            if (Hash::check($contraseña, $user->password)) {
                return response()->json($user->id);
            } else {
                return response('Contraseña incorrecta');
            }
        } else {
            return response('No se encontró el usuario');
        }
    }

    public function verificarLoginZona(Request $request)
    {
        $usuario = $request->nombre;
        $contraseña = $request->contraseña;

        $user = Cliente::where('nombre', $usuario)->first();

        if ($user) {
            if (Hash::check($contraseña, $user->contraseña)) {
                return response()->json($user->id);
            } else {
                return response('Contraseña incorrecta');
            }
        } else {
            return response('No se encontró el usuario');
        }
    }

    public function store(Request $request)
    {
        $user = new Usuario();
        $user->usuario = $request->usuario;
        $user->email = $request->email;
        $user->admin = $request->admin;
        $user->password = Hash::make($request->contraseña);;
        $user->save();

        return response()->json($user);
    }

    public function update(Request $request)
    {
        $idUsuario = $request->idUsuario;

        $usuario = Usuario::findOrFail($idUsuario);
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->rol = $request->rol;

        $usuario->save();

        return response()->json($usuario);
    }

    public function destroy($idUsuario)
    {
        $user = Usuario::findOrFail($idUsuario);
        $user->delete();
        $usuarios = Usuario::all();



        return response()->json($usuarios);
    }

    

    public function obtenerUsuarios()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function obtenerUsuario($idUsuario)
    {

        $usuario = Usuario::where('id', $idUsuario)->first();
        return response()->json($usuario);

      
    }

    public function obtenerIdUsuarioZona($idUsuario)
    {

        $usuario = Cliente::where('id', $idUsuario)->first();
        return response()->json($usuario);

      
    }

    public function obtenerClientes()
    {
        $usuarios = Cliente::all();
        return response()->json($usuarios);
    }

    public function crearUsuarioZona(Request $request){
        $user = new Cliente();
        $user->nombre = $request->usuario;
        $user->email = $request->email;
        $user->contraseña = Hash::make($request->contraseña);
        $user->save();

        return response()->json($user);
    }

    public function deleteUsuarioZona($idUsuario)
    {
        $user = Cliente::findOrFail($idUsuario);
        $user->delete();
        $usuarios = Cliente::all();



        return response()->json($usuarios);
    }
}
