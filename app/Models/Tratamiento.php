<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    protected $fillable= ['codtra','tratamiento','descripcion','pretrat'];


    public function visitas(){
        return $this->belongsToMany('App\Models\Visita')->withPivot('id');
    }
}
