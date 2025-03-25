<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        echo "Formulario para el Login";
        return view(view: 'AuthViews.InicioSesion');
    }

    public function Login(Request $request){
        echo "Funcionablilidad para guardar los datos que provienen del formulario via post";
        //Paso 1 Obtener los valores del request
        //Paso 2 Realizar una consulta a la base de datos
        //Paso 3 Si existen me voy a la vista del cPanel
        //de otro modo me voy a la vista del login
    }
}

