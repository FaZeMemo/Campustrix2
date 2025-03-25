<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmarCorreoMailable;

class RegisterController extends Controller
{
    public function create()
    {
        return view('RegisterViews.registrarusuario');
    }

    public function store(Request $request)
    {
        $nombre=$request->nombre;
        $usuario=$request->nombre;
        $correo=$request->usuario;
        $contrasennia=$request->contrasennia;

//        echo "funcionalidad";
//        echo "<br> Usuario: $usuario, <br> Email: $correo, <br> Pass: $contrasennia";

        DB::insert("INSERT INTO usuarios(id_rol, nombre_usuario, correo_electronico, contrasennia, activo) VALUES(?, ?, ?, ?, ?, ?)", [$nombre, $usuario, $correo, $contrasennia,0]);
        return redirect('/login');

        Mail::to($correo)->send(new ConfirmarCorreoMailable($nombre,$correo));
    }
}
