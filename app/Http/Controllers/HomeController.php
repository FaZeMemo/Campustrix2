<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function __invoke(){
       $roles = DB::select("SELECT * FROM roles");
       dd($roles);
         //return view("welcome");//'Pagina Principal de un Controlador';
     }
}
