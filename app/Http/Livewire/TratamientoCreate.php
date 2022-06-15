<?php

namespace App\Http\Livewire;

use App\Models\Tratamiento;
use Livewire\Component;

class TratamientoCreate extends Component
{
    public $open2= false;
    public $tratamiento, $descripcion, $pretrat, $codtra;
    public $tratamiento2, $descripcion2, $pretrat2, $fecha2;

    public function render(){
        return view('livewire.tratamiento-create');
    }

    public function salir(){
        $this->open2= false;
        $this->codtra= "";
        $this->tratamiento= "";
        $this->descripcion= "";
        $this->pretrat= "";
    }

    public function crear(){

        if ($this->codtra == ""){$this->codtra2= "Campo Obligatorio";}else{$this->codtra2="";}
        if ($this->tratamiento == ""){$this->tratamiento2= "Campo Obligatorio";}else{$this->tratamiento2="";}
        if ($this->descripcion == ""){$this->descripcion2= "Campo Obligatorio";}else{$this->descripcion2="";}
        if ($this->pretrat == ""){$this->pretrat2= "Campo Obligatorio";}else{$this->pretrat2="";}
     
        if ($this->codtra <> "" && $this->tratamiento <> "" && $this->descripcion <> "" && $this->pretrat <> "" ){
    }

}
}