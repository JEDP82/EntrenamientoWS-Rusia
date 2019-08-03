<?php

namespace App\Http\Controllers\EventosController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Eventos\Evento;
use App\Modelos\Eventos\Session;
use DB;

class adminEventosController extends Controller
{

    /** Validacion**/
    public function validateForm(Request $request){
        $rules = [
            'title'=>'required',
            'description'=>'required',
            'date'=>'required'

        ];

        $customMessage = [
            'required'=>'Rellena este campo requerido',
        ];

        return $this->validate($request, $rules, $customMessage);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crudEventos.crearEvento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateForm($request);

        $sesiones = json_decode( $request->sesiones);

        $newEvent =  new Evento;
        $newEvent->title = $request->title;
        $newEvent->description = $request->description;
        $newEvent->date = $request->date;
        $newEvent->time = $request->time;
        $newEvent->duration_days = $request->duration_days;
        $newEvent->location = $request->location;
        $newEvent->standard_price = $request->standard_price;  
        $newEvent->capacity = $request->capacity;

        $newEvent->save();

        $idEvent = $newEvent->id;
        
        

        //TryCatch

        try {
            DB::beginTransaction();

            for($i=0; $i < count($sesiones); $i++){

                $newSession = new Session;
                
                $newSession->title = $sesiones[$i]['0']->value;
                $newSession->time = $sesiones[$i]['1']->value;
                $newSession->room = $sesiones[$i]['2']->value;
                $newSession->speaker = $sesiones[$i]['3']->value;
                $newSession->event_id = $idEvent;
                $newSession->save();
                
            }

            DB::commit();
        } catch (\Throwable $e) {
            
            DB::rollBack();
            return $e->getMessage();
        }
        
       

        //Guardar varios valores en una sola vez para las sesiones.

        return response()->json([
            'mensaje'=>'El evento se agrego correctamente',
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
