<?php

namespace App\Http\Controllers\ClientesController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Eventos\Evento;
use App\Modelos\Clientes\attendees;
use App\User;

class attendeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $infoEvento = Evento::all();

        $newUser = new User;
        $newAttender = new attendees;

        return view('Attender.agregarAttender', compact('infoEvento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = new User;

        $newUser->name = $request->name;
        $newUser->last_name = $request->last_name;
        $newUser->username = $request->username;
        $newUser->photo = "null";
        $newUser->url_linkedin = "null";
        $newUser->password = $request->password;
        $newUser->email = $request->email;
        $newUser->save();

        $idUser = $newUser->id;

        $newAttender = new attendees;
        $newAttender->registration_type = $request->registration_type;
        $newAttender->registration_date = $request->registration_date;
        $newAttender->user_id = $idUser;
        $newAttender->event_id = $request->event_id;

        $newAttender->save();

        return response()->json([
            'mensaje'=>'Usuario guardado correctamente',
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

        $Atendeer = attendees::all();
        $evento = Evento::findOrFail($id);

        return view('Attender.attendeersEvent');
        
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
