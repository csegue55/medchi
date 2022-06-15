<?php

namespace App\Http\Livewire;

use App\Models\Tratamiento;
use Livewire\Component;

class TratamientoListado extends Component
{
    public $search;
    public $campo="id";
    public $direction= 'asc';

    public function render()
    {
        $trats= Tratamiento::where( 'codtra', 'like','%'. $this->search .'%')
        ->orwhere('tratamiento', 'like','%'. $this->search .'%')
        ->orwhere('descripcion', 'like','%'. $this->search .'%')
        ->orwhere('pretrat', 'like','%'. $this->search .'%')   
        ->orderBy($this->campo, $this->direction)->paginate(10);

        return view('livewire.tratamiento-listado', compact('trats'));
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
