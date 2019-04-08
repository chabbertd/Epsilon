<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    //
    protected $fillable = ['nombre', 'valor', 'prefijo', 'sufijo', 'descripcion'];
}
