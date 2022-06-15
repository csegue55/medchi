<?php
use App\Models\Origen;
?>

<x-app-layout>
@livewire('user-listado')  <!-- para el fondo -->

<div class="fixed inset-0 flex items-center justify-center bg-opacity-70 bg-gray-100"
       x-data="{open: true}" 
       x-show="open"
    >
<!-- Recuadro -->
       <div class="flex flex-col shadow-2xl rounded-lg border-2 border-gray-40 bg-white px-10 py-10 ">
       <!-- x-on:click.away="open= false" -->
<!-- Datos -->


        <table>
            <form action="{{route('users.store')}}" method="POST">            
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>    @csrf
 
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">nombre :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="name" wire:model="name" value="{{old('name')}}"></div>
                                           @error('name')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">apellido :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="apellido" wire:model="apellido" value="{{old('apellido')}}"></div>
                                           @error('apellido')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">teléfono :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="tfno" wire:model="tfno" value="{{old('tfno')}}"></div>
                                           @error('tfno')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">email :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="email" wire:model="email" value="{{old('email')}}"></div>
                                           @error('email')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
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
                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">rol :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="rol" wire:model="rol" value="{{old('rol')}}"></div>
                                           @error('rol')<small class="text-bold text-red-700">*{{$message}}</small>@enderror

                </div>
                <div class="flex flex-row mt-2">
                        <div class="bg-red-200 w-20 mr-4 h-6">Password :</div>
                        <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-30" 
                                           type="text" name="password" wire:model="password" value="{{old('password')}}"></div>
                                           @error('password')<small class="text-bold text-red-700">*{{$message}}</small>@enderror

                </div>

                <br>
                <div class="flex flex-row justify-between">
                        <div><a class="bg-slate-100 border-2 rounded-md p-1" href="{{route('users.listado')}}" @click="open= false" type="button">Volver</a></div>
                        <div><input class="bg-red-200   border-2 rounded-md p-1"type="submit" class="ml-2 mt-6"></input></div>
                </div>

            </form>
        </table>

       <!-- Footer -->
       <div class="flex justify-between">
                <!--
                <button @click="open= false" type="button">Close</button>
                <a href="{{route('inicio.welcome')}}" type="button" class="">Ir Inicio</a>
                -->
        </div>
       </div>
</div>
<!-- .................................................................................... -->   


</x-app-layout>