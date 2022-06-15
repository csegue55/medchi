<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrigenCreate extends Component
{
    
    public $open2= false;
    public $descorigen;
    public $descorigen2;

    public function render()
    {
        return view('livewire.origen-create');
    }

    public function salir(){
        $this->open2= false;
        $this->descorigen= "";
    }

    public function crear(){

        if ($this->descorigen == ""){$this->descorigen2= "Campo Obligatorio";}else{$this->descorigen2="";}
    }
}
