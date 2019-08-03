<?php

namespace App\Modelos\Eventos;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $fillable = [
        'value', 'event_id', 'user_id',
    ];
    //
    protected $table = 'event_ratings';
}
