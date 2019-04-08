<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    //
    protected $fillable = ['nombre', 'descripcion', 'sector_id'];


     public function sector()
    {
        return $this->belongsTo('App\Sector');
    }


     public function ensayos()
    {
        return $this->hasMany('App\Ensayo');
    }


}
