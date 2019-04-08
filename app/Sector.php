<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //
    protected $fillable = ['nombre', 'descripcion'];


     public function muestras()
    {
        return $this->hasMany('App\Muestra');
    }



}
