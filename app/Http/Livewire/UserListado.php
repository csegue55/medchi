<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserListado extends Component
{
    public $search;
    public $campo="id";
    public $direction= 'asc';

    public function render()
    {
        $users= User::where( 'name', 'like','%'. $this->search .'%')
                     ->orwhere('apellido', 'like','%'. $this->search .'%')
                     ->orwhere('tfno', 'like','%'. $this->search .'%')   
                     ->orwhere('email', 'like','%'. $this->search .'%')
                     ->orwhere('origen_id', 'like','%'. $this->search .'%')
                     ->orwhere('rol', 'like','%'. $this->search .'%')
                     ->orwhere('cont', 'like','%'. $this->search .'%')
                     ->orderBy($this->campo, $this->direction)->paginate(10);

        return view('livewire.user-listado', compact('users'));
    }
    //..........................................................................................................................
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
