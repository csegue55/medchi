<div>

<?php
if(!isset($_SESSION)) {
    session_start();
}


use Illuminate\Support\Facades\Auth;    
?>
   
<!-- BANNER -->
<!-- ....tailwind.config.js ............................................................................................ -->
<!-- ................................................................................................................... -->

    <div class="flex justify-center bg-blue-900 mb-4">
        @if (Auth::check())
        <p class="text-white  font-bold ml-10">SESION COMO : <?php echo " ".$_SESSION['login']['u_rol'];?> - <?php echo $_SESSION['login']['u_nom'];?> </p>
        @else
        <p class="text-blue-900">.</p>
        @endif                     
    </div>

<!--  -->
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->

<div class="col-xl-9 colmod12 shadow" >
        <h3 class="text-center font-bold mb-4">LISTADO DE ORIGENES</h3>    
        
        <div class=" mb-4">
            @livewire('origen-create')
        </div>

    <table class=""> 

        <div class="flex items-center mb-1">  
            <x-jet-input class="flex-1 mr-4 bg-blue-50" placeholder="Escriba su búsqueda" type="text" wire:model="search"/> <!-- flex-1 -->
        </div>

        <div class="bg-blue-200 w-full" >{{$search}}</div> 
        
            <tr>
            <th class="cursor-pointer text-center" wire:click="order('id') "><input class="h-6 border-0 bg-red-100 w-10"  type="text" disabled placeholder="id">
                                <br>
                                @if($campo == "id")
                                @if($direction == "asc")
                                    <span class="icon-sort-name-up float-center ml-4 text-xs mt-1"></span>
                                    @else
                                    <span class="icon-sort-name-down float-center ml-4 text-xs mt-1"></span>
                                    @endif
                                @else
                                    <span class="icon-arrow-combo float-center ml-4 text-xs mt-1"></span>
                                @endif
            </th>
            <th class="cursor-pointer text-center" wire:click="order('id') "><input class="h-6 border-0 bg-red-100 w-80"  type="text" disabled placeholder="Origen">
                                <br>
                                @if($campo == "id")
                                @if($direction == "asc")
                                    <span class="icon-sort-name-up float-center ml-4 text-xs mt-1"></span>
                                    @else
                                    <span class="icon-sort-name-down float-center ml-4 text-xs mt-1"></span>
                                    @endif
                                @else
                                    <span class="icon-arrow-combo float-center ml-4 text-xs mt-1"></span>
                                @endif
            </th>
            </tr>
    </table>    
    @foreach($origenes as $origen)
    <table>
                  
            <tr>
            <td><input class="h-5 mb-0 border-0 bg-gray-200 w-10"      type="text" disabled   name="id"             value="{{$origen->id}}"></td>
            <td><input class="h-5 mb-0 border-0 bg-gray-200 w-80"      type="text" disabled   name="descorigen"     value="{{$origen->descorigen}}"></td>
  
            <td><a class="bg-red-100 text-black mr-4" href="{{route('origenes.editar', $origen)}}" >Editar</a></td>
            <td><a class="bg-red-100 text-black mr-4" href="{{route('origenes.show', $origen)}}" >Eliminar</a></td>
            </tr>

    </table>
    
    @endforeach
         
    <div class="text-center">
            {{$origenes->links()}}
    </div>

  

</div>


</div>
