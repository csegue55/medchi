<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductoCreate extends Component
{

    public $open2= false;
    public $nombre, $preprod;
    public $nombre2, $preprod2;


    public function render()
    {
        return view('livewire.producto-create');
    }

    public function salir(){
        $this->open2= false;
        $this->nombre= "";
        $this->preprod= "";
    }

    public function crear(){

        if ($this->nombre == ""){$this->nombre2= "Campo Obligatorio";}else{$this->nombre2="";}
        if ($this->preprod == ""){$this->preprod2= "Campo Obligatorio";}else{$this->preprod2="";}
    }
}
