<?php

namespace App\Modelos\Eventos;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $table = "events";
    
    public function sessiones(){

        
        return $this->hasMany(Session::class,'event_id');
    }


}
