<?php

namespace App\Http\Controllers\EventosController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Clientes\attendees;
use App\Modelos\Eventos\Evento;
use App\Modelos\Eventos\rating;
use App\User;

class adminRatingEventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        
        $evento = rating::where('event_id', $id)->get();

      
        return response()->json([
            'RatingsEventos'=>$evento,
            "Mensaje"=>"API funcionando",
            "status"=>200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $evento = Evento::all();

        return view('eventRating', compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $usuario = User::where('email', $request->email)->first();
        $usuario_id = $usuario->id;
       
        $addRating = new rating;
        $addRating->value = $request->value;
        $addRating->event_id = $request->event_id;
        $addRating->user_id = $usuario_id;

        $addRating->save();

        return response()->json([
            'mensaje'=> 'Funciona rating',
            'status'=>'200'
            
        ]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
