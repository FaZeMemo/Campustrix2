<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function podcast($parametro1, $parametro2 = "Sin Categoria")
    {
        $podArray = ["niños", "salud", "economia"];

        foreach ($podArray as $elemento) {
            $encontrado = false;
            if (strcmp($elemento, $parametro1) === 0) {
                echo "El tema de podcast es $parametro1";
                $encontrado = true;
            }
        }
            if ($encontrado==false) {
                echo "Tema incorrecto <br>";
            }
                //return "El tema de podcast es $parametro1 de la categoria $parametro2";//view controller



    }

}
