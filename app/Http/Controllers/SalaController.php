<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use DateTime;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'Vista index()';
        $salas = Sala::all(); //trayendo los datos de la bd
        return view('sala.index')->with('salas',$salas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sala.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insertando los datos en la base de datos
        $salas = new Sala();
        $salas->Sala = $request->get('sala');
        $salas->Descripcion = $request->get('descripcion');
        $salas->Inicio = $request->get('inicio');
        $salas->Final = $request->get('final');

        $fechainicio=new DateTime( $salas->Inicio );
        $fechafinal=new DateTime( $salas->Final );
        $intervalo = $fechainicio->diff($fechafinal);

        if ( $intervalo->y<=0) //condicionales para que solo pueda ser intervalo de dos horas
        {
            if($intervalo->m<=0)
            {
              if( $intervalo->d<=0)
              {
                if( $intervalo->h<=2)
                {
                    if ($intervalo->h==2){ if($intervalo->i>=1){   return back();  }}
                    $salas->save();
                 
                }
              }

            }
        }
        return redirect('/salas'); //redireccion a la vista principal
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $sala = Sala::find($id); //si filtra por id
         return view('sala.edit')->with('sala',$sala); //retorna vista de editar
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sala = Sala::find($id); //introduccion de los datos
        $sala->sala = $request->get('sala');
        $sala->Descripcion = $request->get('descripcion');
        $sala->Inicio = $request->get('inicio');
        $sala->Final = $request->get('final');
        $fechainicio=new DateTime( $sala->Inicio );
        $fechafinal=new DateTime( $sala->Final );
        $intervalo = $fechainicio->diff($fechafinal);

        if ( $intervalo->y<=0) //condicionales para que solo pueda ser intervalo de dos horas
        {
            if($intervalo->m<=0)
            {
              if( $intervalo->d<=0)
              {
                if( $intervalo->h<=2)
                {
                    if ($intervalo->h==2){ if($intervalo->i>=1){   return back();  }}
                    $sala->save();
                 
                }
              }

            }
        }
        return redirect('/salas'); //redireccion a la vista principal
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::find($id);        //se filtra por id
        $sala->delete(); //se elimina de la base de datos

        return redirect('/salas'); //redireccion
    }
}
