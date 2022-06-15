<?php
use App\Models\Origen;
?>


<div>

        <x-jet-button wire:click="$set('open2', true)">
            Nuevo
        </x-jet-button>


<x-jet-dialog-modal wire:model="open2">

        <!-- .................................................................................................................................. -->
        <x-slot  name="title">
                <p class="text-center font-bold">Introducir cliente nuevo</p>
        </x-slot>
        <!-- .................................................................................................................................. -->      
        <x-slot name="content">

            <table>
            <form action="{{route('users.store')}}" method="POST">            
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>    @csrf
                <!--
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">id :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="id" value="{{old('id')}}"></div>
                </div>
                -->
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">nombre :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="name" wire:model="name" value="{{old('name')}}"></div>
                                           {{$name2}}
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">apellido :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="apellido" wire:model="apellido" value="{{old('apellido')}}"></div>
                                           {{$apellido2}}
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">teléfono :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="tfno" wire:model="tfno" value="{{old('tfno')}}"></div>
                                           {{$tfno2}}
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">email :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="email" wire:model="email" value="{{old('email')}}"></div>
                                           {{$email2}}
                </div>                           
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">origen :</div>
                         <!--<div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" type="text" name="origen_id" wire:model="origen_id" value="{{old('origen_id')}}"></div>-->
                                
                                <select class="w-2/3 bg-gray-200" name="origen_id">
                                        <optgroup label= "Origenes">
                                                <?php $origenes= Origen::all(); ?>        
                                                @foreach($origenes as $origen)
                                                        <option class="bg-lime-200" value="{{$origen->id}}" selected >{{$origen->descorigen}}</option>
                                                @endforeach
                                        </optgroup>
                                </select>
                                {{$origen_id2}}
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">rol :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="rol" wire:model="rol" value="{{old('rol')}}"></div>
                                           {{$rol2}}
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">Password :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="password" wire:model="password" value="{{old('password')}}"></div>
                                           {{$password2}}
                </div>

                <x-jet-secondary-button wire:click="$set('open2', false)">Cancelar</x-jet-secondary-button>  

                @if ($this->name <> "" && $this->apellido <> "" && $this->tfno <> "" && $this->email <> "" && $this->rol <> "" &&  $this->password <> "")
                        <x-jet-danger-button type="submit" class="ml-2 mt-6">Grabar</x-jet-danger-button>
                @else
                        <x-jet-danger-button wire:click="crear" class="ml-2 mt-6">Revisar Entrada</x-jet-danger-button>
                @endif



            </form>
            </table>

        </x-slot>      
        <!-- .................................................................................................................................. -->           
        <!-- .................................................................................................................................. -->      
        <x-slot name="footer">
               
        </x-slot>     
        <!-- .................................................................................................................................. --> 

</x-jet-dialog-modal>



</div>
