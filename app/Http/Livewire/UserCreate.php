<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserCreate extends Component
{
    public $open2= false;
    public $name, $apellido, $tfno, $email, $origen_id, $rol, $password ;
    public $name2, $apellido2, $tfno2, $email2, $origen_id2, $rol2, $password2;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function salir(){
        $this->open2= false;
        $this->name= "";
        $this->apellido= "";
        $this->tfno= "";
        $this->email= "";
        $this->origen_id= "";
        $this->rol= "";
        $this->password= "";
    }

    public function crear(){

        if ($this->name == ""){$this->name2= "Campo Obligatorio";}else{$this->name2="";}
        if ($this->apellido == ""){$this->apellido2= "Campo Obligatorio";}else{$this->apellido2="";}
        if ($this->tfno == ""){$this->tfno2= "Campo Obligatorio";}else{$this->tfno2="";}
        if ($this->email == ""){$this->email2= "Campo Obligatorio";}else{$this->email2="";}
        if ($this->origen_id == ""){$this->origen_id2= "Campo Obligatorio";}else{$this->origen_id2="";}
        if ($this->rol == ""){$this->rol2= "Campo Obligatorio";}else{$this->rol2="";}
        if ($this->password == ""){$this->password2= "Campo Obligatorio";}else{$this->password2="";}
     
        if ($this->name <> "" && $this->apellido <> "" && $this->tfno <> "" && $this->email <> "" && $this->origen_id <> "" && $this->rol <> "" &&  $this->password <> ""){
        }
    }





}
