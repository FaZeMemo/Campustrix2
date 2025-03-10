<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        echo "**Página Web** principal que muestra información relacionada con los productos.";
    }

    public function create(Request $request)
    {
        // Muestra un formulario para crear un producto
        echo "**Formulario** para guardar nuevos productos, utilizando los valores provenientes de un formulario que usa el método POST.";
        dd($request->all());
    }

    public function show($id)
    {
        echo "**Mostrando** información del producto con ID = {$id}.";
    }

    public function destroy($id)
    {
        echo "**Funcionalidad** para eliminar un recurso con el ID = {$id}.";
    }
}

