<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Eventos\Evento;
use App\Modelos\Clientes\attendees;
use App\User;
use App\Modelos\Eventos\rating;
use DB;
class apiController extends Controller
{
    
    public function infoEvento(){
        // $eventosJoin =  Evento::select("events.*", "sessions.*")->join("sessions","sessions.event_id","=","events.id")->get();
        
        $eventos = Evento::with('sessiones')->get();
        
        
        return response()->json([
            'eventos'=> $eventos,
        ]);
    }

    public function registroEvent(Request $request){
        $usuario = User::where('email', $request->email)->first();
        $asistente = new attendees;

        
        $asistente->user_id = $usuario->id;
        $asistente->event_id = $request->event_id;
        $asistente->registration_date = date('Y-m-d H:i:s');
        $asistente->registration_type = $request->registration_type;

        $asistente->save();

        return response()->json([
            'mensaje'=>'registro completado',
        ]);
        
    }

    
    public function showEventsUser(Request $request){

        
        $infoEvento = User::select('users.*', 'attendees.*', 'events.*')->join('attendees','attendees.id', '=', 'users.id')
        ->join('events','events.id', '=', 'attendees.event_id')
        ->where('users.id', $request->user_id)
        ->get();
      
        
        return response()->json([
            'infoEvento'=>$infoEvento,
        ]);
    }

    public function userRatingEvent(Request $request){
        $ratingEvento = new rating;

        $ratingEvento->value = $request->value;
        $ratingEvento->event_id = $request->event_id;
        $ratingEvento->user_id = $request->user_id;

        $ratingEvento->save();

        return response()->json([
            'mensaje'=> 'Evento calificado correctamente',
            'Status'=> '200'
        ]);
    }

    //Create User
    public function createUser(Request $request){
        $newUser = new User;


        
        $newUser->name = $request->name;
        $newUser->last_name = $request->last_name;
        $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->url_linkedin = $request->url_linkedin;
        $newUser->photo = "null";

        $newUser->save();

        return response()->json([
            'Mensaje'=>'El registro se hizo correctamente',
            'Status'=>'200'
        ]);
    }
    
}
