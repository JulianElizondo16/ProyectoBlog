<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentariosController extends Controller
{
    //Para definir un metodo seria:
    //METODO PARA MOSTRAR DONDE VAN TODOS LOS COMENTARIOS.
    public function index(Request $request){
        //Aca estamos llamando a la vista


        $busqueda = $request->busqueda;
        $comentarios = Comentario::where('motivo','LIKE','%'.$busqueda.'%')
                    ->orWhere('name','LIKE','%'.$busqueda.'%')
                    ->orderBy('id', 'desc')
                    
                    ->paginate(10);
        
        /* por ahora unicamente vamos a dejar el codigo de abajo comentado NO BORRAR */
        /* $comentarios = Comentario::orderBy('id', 'desc')->paginate(10); */

        return view('vistasPrincipales.PaginaComentarios', compact('comentarios'));
    }
    

    //METODO PARA GUARDAR LOS DATOS EN BASE DE DATOS.
    public function GenerarComentario(Request $request){

     $comentario = new Comentario();

     $comentario->name = $request->name;
     $comentario->email = $request->email;
     $comentario->motivo = $request->motivo;
     $comentario->descripcion = $request->descripcion;

     $comentario->save();

     return redirect()->route('comentarios.home');
    }
    //FUNCION PARA MOSTRAR EL DETALLE DEL COMENTARIO
    public function show($comentario){


    $comentario = Comentario::find($comentario);
    return view('resumenComent',compact('comentario'));
    }

}
