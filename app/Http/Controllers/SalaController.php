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
        $salas = Sala::all();
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
        $salas = new Sala();
        $salas->Sala = $request->get('sala');
        $salas->Descripcion = $request->get('descripcion');
        $salas->Inicio = $request->get('inicio');
        $salas->Final = $request->get('final');

        $fechainicio=new DateTime( $salas->Inicio );
        $fechafinal=new DateTime( $salas->Final );
        $intervalo = $fechainicio->diff($fechafinal);

        if ( $intervalo->y<=0)
        {
            if($intervalo->m<=0)
            {
              if( $intervalo->d<=0)
              {
                if( $intervalo->h<=2)
                {
                    if ($intervalo->h==2){ if($intervalo->i>=1){     return back();         }}
                    $salas->save();
                    return redirect('/salas'); 
                }
              }

            }
        }
        
        
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
         $sala = Sala::find($id);
         return view('sala.edit')->with('sala',$sala);
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
        $sala = Sala::find($id);
        $sala->sala = $request->get('sala');
        $sala->Descripcion = $request->get('descripcion');
        $sala->Inicio = $request->get('inicio');
        $sala->Final = $request->get('final');
        $sala->save();

        return redirect('/salas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::find($id);        
        $sala->delete();

        return redirect('/salas');
    }
}
