<?php

namespace App\Http\Livewire;

use App\Models\Origen;
use Livewire\Component;

class OrigenListado extends Component
{
    public $search;
    public $campo="id";
    public $direction= 'asc';

    public function render()
    {
        $origenes= Origen::where( 'descorigen', 'like','%'. $this->search .'%')
        ->orderBy($this->campo, $this->direction)->paginate(10);

        return view('livewire.origen-listado', compact('origenes'));
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
