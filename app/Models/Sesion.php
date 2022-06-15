<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visita;

class Sesion extends Model
{
    use HasFactory;
    protected $fillable= ['fecha','visita_id'];

    public function visita(){
        return $this->belongsTo(Visita::class);
    }

    
}
