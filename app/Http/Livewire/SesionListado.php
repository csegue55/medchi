<?php

namespace App\Http\Livewire;

use App\Models\Sesion;
use Livewire\Component;

class SesionListado extends Component
{
    public $search;
    public $campo="id";
    public $direction= 'asc';

    public function render()
    {
        $sesions= Sesion::where( 'fecha', 'like','%'. $this->search .'%')
        ->orwhere('visita_id', 'like','%'. $this->search .'%')
        ->orderBy($this->campo, $this->direction)->paginate(10);

        return view('livewire.sesion-listado', compact('sesions'));
    }

    public function order($campo)
    {
        if ($this->campo == $campo) {
               if($this->direction == "desc"){
                      $this->direction= "asc";
               }else{
                      $this->direction= "desc";
               }
        } 
        $this->campo= "$campo";
    }
}
