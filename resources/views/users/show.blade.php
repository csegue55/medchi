<x-app-layout>
        @livewire('user-listado')



<!-- Modal -->
<!-- .................................................................................... -->    
    <!-- x-show.transition.duration.500ms="open" No funciona-->
    <!-- x-init="() => { setTimeout(() => {open= true},3000); }" Si funciona -->
    <!-- .................................................................................... -->        
    <div class="fixed inset-0 flex items-center justify-center bg-opacity-70 bg-gray-100"
       x-data="{open: true}" 
       x-show="open"
    >
<!-- Recuadro -->
       <div class="flex flex-col shadow-2xl rounded-lg border-2 border-gray-40 bg-white px-10 py-10 "
       >
       <!-- x-on:click.away="open= false" -->
<!-- Datos -->   
        <h3 class="text-center text-bold text-2xl">Eliminar cliente</h3>
        <hr class="bg-gray-700 h-1 w-full mx-auto">
        <div class="div">
        <table>
        <form action="{{route('users.destroy', $user)}}" method="post">            
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>       @csrf
                    <input type="hidden" name="_method" value="DELETE"/>                  @method('delete')

            <div class="flex flex-row mt-2">
                    <div class="bg-red-200 w-20 mr-4 h-6">id :</div>
                    <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-72  " type="text" disabled name="id" value="{{$user->id}}"></div>
            </div>
            <div class="flex flex-row mt-2">
                    <div class="bg-red-200 w-20 mr-4 h-6">nombre :</div>
                    <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-72  " type="text"  name="name" value="{{$user->name}}"></div>
                    @error('name')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
            </div>
            <div class="flex flex-row mt-2">
                    <div class="bg-red-200 w-20 mr-4 h-6">apellido :</div>
                    <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-72  " type="text" name="apellido" value="{{$user->apellido}}"></div>
                    @error('apellido')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
            </div>
            <div class="flex flex-row mt-2">
                    <div class="bg-red-200 w-20 mr-4 h-6">teléfono :</div>
                    <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-72  " type="text"   name="tfno" value="{{$user->tfno}}"></div>
                    @error('tfno')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
            </div>
            <div class="flex flex-row mt-2">
                    <div class="bg-red-200 w-20 mr-4 h-6">email :</div>
                    <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-72  " type="text"  name="email" value="{{$user->email}}"></div>
                    @error('email')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
            </div>
            <div class="flex flex-row mt-2">
                    <div class="bg-red-200 w-20 mr-4 h-6">rol :</div>
                    <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-72  " type="text" name="rol" value="{{$user->rol}}"></div>
                    @error('rol')<small class="text-bold text-red-700">*{{$message}}</small>@enderror
            </div>
            <div class="flex flex-row mt-2">
                    <div class="bg-red-200 w-20 mr-4 h-6">cont :</div>
                    <div class="w-80"><input class="h-6 border-0 bg-gray-200 w-72  " type="text"  disabled name="cont" value="{{$user->cont}}"></div>
            </div>

                            

            <a class="mt-6 bg-slate-100 border-2 rounded-md  p-1" href="{{route('users.listado')}}" @click="open= false" type="button">Volver</a>
            <x-jet-danger-button class="mt-6" type="submit" class="ml-2">Eliminar cliente</x-jet-danger-button>              

        </form>
        </table>              
        </div>
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