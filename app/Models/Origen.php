<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Origen extends Model
{
    use HasFactory;
    protected $fillable= ['descorigen'];


    public function user(){
        //return $this->belongsTo(Visita::class);
        return $this->hasOne(User::class);
    }

    
}
