<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Origen;
use App\Models\Sesion;


class Visita extends Model
{
    use HasFactory;
    protected $fillable= ['fecha','sintomas','observaciones'];

    public function tratamientos(){
        return $this->belongsToMany('App\Models\Tratamiento')->withPivot('id');
    }        

    public function productos(){
        return $this->belongsToMany('App\Models\Producto');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sesions(){
        return $this->hasMany(Sesion::class);
    }        

}
