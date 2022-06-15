<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class ProductoListado extends Component
{
    public $search;
    public $campo="id";
    public $direction= 'asc';

    public function render()
    {
        $productos= Producto::where( 'nombre', 'like','%'. $this->search .'%')
        ->orwhere('preprod', 'like','%'. $this->search .'%')
        ->orderBy($this->campo, $this->direction)->paginate(10);


        return view('livewire.producto-listado', compact('productos'));
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
