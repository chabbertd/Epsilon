<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ensayo extends Model
{
    //
    protected $fillable = ['nombre', 'descripcion', 'muestra_id'];


     public function muestra()
    {
        return $this->belongsTo('App\Muestra');
    }



}
