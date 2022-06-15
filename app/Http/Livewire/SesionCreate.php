<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SesionCreate extends Component
{
    public $open3= false;
    public $fecha, $visita_id;    
    public $fecha2, $visita_id2;



    public function render()
    {
        return view('livewire.sesion-create');
    }

    public function salir(){
        $this->open3= false;
        $this->fecha= "";
        $this->visita_id= "";
    }

    public function crear(){

        if ($this->fecha == ""){$this->fecha2= "Campo Obligatorio";}else{$this->fecha2="";}
        if ($this->visita_id == ""){$this->visita_id2= "Campo Obligatorio";}else{$this->visita_id2="";}
}
}