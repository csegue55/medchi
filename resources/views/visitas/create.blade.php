<?php
if(!isset($_SESSION)) {
    session_start();
}

use App\Models\Origen;
use App\Models\Producto;
use App\Models\Tratamiento;
use Illuminate\Support\Facades\Auth;    
/*******************************************************************************************************************/
if (Auth::check())
{ 
    if(isset($_SESSION['login'])){
/*        
        echo "sesion Abierta a usuario :"."<br>";
        echo "id_Usuario :"   .$_SESSION['login']['u_id'];   echo"<br>";
        echo "Nom_Usu :"      .$_SESSION['login']['u_nom'];  echo"<br>";
        echo "apellido_Usua :".$_SESSION['login']['u_ape'];  echo"<br>";
        echo "telefono_usu :" .$_SESSION['login']['u_tel'];  echo"<br>";
        echo "email_Usuari :" .$_SESSION['login']['u_ema'];  echo"<br>";
        echo "rol_Usuari :"   .$_SESSION['login']['u_rol'];  echo"<br>";
        echo "rol_Contador :" .$_SESSION['login']['u_con'];  echo"<br>";
*/
    }else
    {
        echo "sesion No Abierta";
    }
}else{
session_destroy();
echo "Sesion cerrada";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>


<x-app-layout>


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

<!-- ACCESO A MENUS -->
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->

<div class="flex justify-center ">
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('users.listado')}}">PACIENTES</a></div>
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('tratamientos.listado')}}">TRATAMIENTOS</a></div>
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('productos.listado')}}">PRODUCTOS</a></div>
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('origenes.listado')}}">ORIGENES</a></div>
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('visitas.listado')}}">VISITAS</a></div>
    </div>

    <div class="mt-4">
        <hr class="bg-red-900 h-1">
            <p class="text-center">CREACION DE VISITA NUEVA</p>
        <hr class="bg-red-900 h-1">
    </div>
















<!-- CAMPOS -->      
<!-- ******************************************************************************************************************************* -->
<!-- ******************************************************************************************************************************* -->
<form action="{{route('visitas.store')}}" method="POST">     
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>    @csrf


<div class="container mx-auto">
<div class="grid grid-cols-4 grid-rows-2">
    <!-- .......................................................................................................................... -->

    <div class="border-0 border-black shadow-lg shadow-slate-300  bg-white col-start-1 row-span-4 mr-10 ml-10 mt-4"></h1>
        <div class=""> 
                <hr  class="ml-4 mt-4 mb-4 mr-4 h-1 bg-gradient-to-r from-black via-gray-400 to-gray-200">
                <div class="flex flex-row">
                    <div 
                        class="ml-4 mr-6 text-red-700 font-bold">Fecha :
                    </div>
                    <div>
                        <input class="w-30 h-6" type="date" name="fecha" >
                    </div>
                </div>   
                @error('fecha')<small class="text-bold text-white border-2 border-black bg-blue-900 ml-4 mt-20 ">*{{$message}}</small>@enderror 

                <!-- .................................................................................................................. -->
                <div class="ml-4 mr-6 mt-6  text-red-700 font-bold">Paciente : 
                    <select class="bg-gray-200 w-34 h-10 mt-4" name="id">
                        <optgroup label= "Cliente">
                            @foreach($users as $user)
                                <option class="bg-lime-200" value="{{$user->id}}" >{{$user->id}}-{{$user->name}}</option>  <!-- selected -->
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <!-- .................................................................................................................. -->
                <div class="mr-10 ml-4 mt-10">
                    <input class="bg-red-300 border-2 rounded-md p-1 w-full"type="submit" class="ml-2 mt-6"></input>    
                </div>
                
        </div>
    </div>
    <!-- .......................................................................................................................... -->
    <div class="border-l-2 border-black shadow-lg shadow-slate-300 bg-white col-start-2 col-span-3 mr-10 mt-4">
        <hr  class="ml-12 mt-4 mb-4 w-2/3  h-1 bg-gradient-to-r from-black via-gray-400 to-gray-200">
        <div class="flex flex-row mt-2">
            <div class="w-40 ml-12 mr-4 h-6 text-red-700 font-bold">S??ntomas :</div>
            <div class="mb-2"><textarea rows="1" cols="70" type="text" name="sintomas" value="{{old('sintomas')}}"></textarea></div>
        </div> 
        @error('sintomas')<small class="text-bold text-white border-2 border-black bg-blue-900 ml-4 mt-20 ">*{{$message}}</small>@enderror 
    </div>
    <!-- .......................................................................................................................... -->
    <div class="border-l-2 border-black shadow-lg shadow-slate-300 bg-white col-start-2 col-span-3 mr-10 mt-4">
        <hr  class="ml-12 mt-4 mb-4 w-2/3  h-1 bg-gradient-to-r from-black via-gray-400 to-gray-200">
        <div class="flex flex-row">
            <div class="w-40 ml-12 mr-4 h-6 text-red-700 font-bold">Observaciones :</div>
            <div class="mb-2">
                <textarea class="border-1 bg-white w-30" name="observaciones" value="{{old('observaciones')}}" cols="70" rows="1"></textarea>
            </div>
        </div>
        @error('observaciones')<small class="text-bold text-white border-2 border-black bg-blue-900 ml-4 mt-20 ">*{{$message}}</small>@enderror   
    </div>
    <!-- .......................................................................................................................... -->
</div>
</div>
<!-- ******************************************************************************************************************************* -->


<div class="container mx-auto">
<div class="grid grid-cols-4">
    <!-- .......................................................................................................................... -->
    <!-- .......................................................................................................................... -->
    <div class="border-l-2 border-black shadow-lg shadow-slate-300 bg-white col-start-2 col-span-3 mr-10 mt-4">
            <hr  class="ml-12 mt-4 mb-4 h-1 bg-gradient-to-r from-black via-gray-400 to-gray-200">
            <div class="ml-12 text-red-700 font-bold">Tratamientos :</div>
            <div class="flex flex-row ml-28 ">
                <div>
                    <?php $tratamientos= Tratamiento::all(); ?>
                    @foreach($tratamientos as $tratamiento)
                        <input class="ml-12" type="checkbox" id="" name="tratamiento[]" value= "{{$tratamiento->id}}">
                        <div class="inline-block mt-2"> {{$tratamiento->tratamiento}}</div><br>
                    @endforeach
                </div>    
        </div>       
    </div>
    <!-- .......................................................................................................................... -->
    <div class="border-l-2 border-black shadow-lg shadow-slate-300 bg-white col-start-2 col-span-3 mr-10 mt-4">
            <hr  class="ml-12 mt-4 mb-4 h-1 bg-gradient-to-r from-black via-gray-400 to-gray-200">
            <div class="ml-12 text-red-700 font-bold">Productos :</div> 
            <div class="flex flex-row ml-28 ">
                <div>
                    <?php $productos= Producto::all(); ?>
                    @foreach($productos as $producto)
                        <input class="ml-12" type="checkbox" id="" name="producto[]" value= "{{$producto->id}}">
                        <div class="inline-block mt-2"> {{$producto->nombre}}</div><br>
                    @endforeach
                </div>    
            </div>
    </div>
    <!-- .......................................................................................................................... -->
</div>
</div>
<!-- ******************************************************************************************************************************* -->
</div>
     
</form>





















<!-- ................................................................................................................... -->
</x-app-layout>

</body>
</html>
