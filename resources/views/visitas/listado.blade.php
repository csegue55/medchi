<?php
if(!isset($_SESSION)) {
    session_start();
}

use App\Models\Visita;
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
/*******************************************************************************************************************/
$desplegar= 0;              // Desplegado = 1 + plegado = 0 . Quita la linea única de count() y pone los registros. 
$buscar= 0;
/*******************************************************************************************************************/
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
        <div><a class="bg-slate-200 px-2 py-2 mb-60 mr-4" href="{{route('users.listado')}}">CLIENTES</a></div>
        <div><a class="bg-slate-200 px-2 py-2 mb-60 mr-4" href="{{route('tratamientos.listado')}}">TRATAMIENTOS</a></div>
        <div><a class="bg-slate-200 px-2 py-2 mb-60 mr-4" href="{{route('productos.listado')}}">PRODUCTOS</a></div>
        <div><a class="bg-slate-200 px-2 py-2 mb-60 mr-4" href="{{route('origenes.listado')}}">ORIGENES</a></div>
        <div><a class="bg-slate-200 px-2 py-2 mb-60 mr-4" href="{{route('visitas.listado')}}">VISITAS</a></div>
      
        <!--
        <div><a class="bg-red-300 px-2 py-2 mb-60 mr-4" href="{{route('sesiones.listado')}}">VISITAS</a></div>
        <div><a class="bg-red-300 px-2 py-2 mb-60 mr-4" href="{{route('agendas.listado')}}">AGENDA</a></div>
        -->

    </div>

    <br><hr class="bg-red-900 h-1">


<!-- Plegar y Desplegar -->
<!-- ****************************************************************************************************************** -->
<div class="flex flex-row justify-between">
    <form action="" method="">

                <p><a class="mr-20 font-bold">Listado de Visitas</a>
                <!-- ................................................................................... -->
                <input class="border-2 border-blue-500 px-2 mr-4 mt-1" type="submit" value="Desplegar" name="btndesplegar">
                <?php if(isset($_REQUEST['btndesplegar'])){ ?>
                    <input class="bg-red-300 mt-2 mr-4" type="submit" value="Plegar" name="btnplegar">
                    <?php $desplegar=1; ?>
                <?php } ?>  
                <!-- ................................................................................... -->
                 <!-- ................................................................................... -->
                 <a class="border-2 border-blue-500 px-2 mr-4 mt-1 pb-0.5" href="{{route('visitas.create')}}">Crear Visita</a>
                </p>
    </form>




<!-- ****************************************************************************************************** -->
</div>
<hr class="bg-red-900 h-1">

  
<!-- Buscar -->
<!-- ****************************************************************************************************** -->
<div>
<!--
    <form action="" method="GET">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>    @csrf
            
            <input class="bg-green-300 w-auto px-2 py-2 mr-4" type="submit" value="Buscar por Cliente"  name="btnbuscar">
            <input class="w-96 px-2 mr-4" type="text" value="" name="nombre">

            
            <?php   
            /* 
            if(isset($_REQUEST['btnbuscar']))
            {
                  $_SESSION['recoger']= $_GET["nombre"];
                  if(  ($users= User::where('name', 'like', '%'. $_SESSION['recoger'].'%')->first() ) <> ""){
                    echo "hay coincidencias:".$users->name."<br>";
                    echo "hay coincidencias:".$users->visitas;
                  }else{
                      //echo $users->id;
                      //$_SESSION['recoger']="";
                      echo "No hay coincidencias:".$users;
                  }
            }
            */
            ?>
    </form>   
-->    
</div>   
<!-- ****************************************************************************************************** -->   


<!-- Listado sin buscar -->      
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->

@if ($buscar== 0)    

   <table class="table">
   <thead>
        <tr class="bg-gray-200 text-sm">
           <th class="w-8  ">               id<hr class="bg-black"></th>
           <th class="w-28 ">               Fecha<hr class="bg-black"></th>
           <th class="w-10 ">               Cli<hr class="bg-black"></th>
           <th class="w-52 text-left   ">   Nombre<hr class="bg-black"></th>
           <th class="w-52 text-left ">     Apellido<hr class="bg-black"></th>
           <th class="w-8 ">                Origen<hr class="bg-black"></th>
           <!--<th class="w-40 ">           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <hr class="bg-black"></th>-->
           <th class="w-72  text-left">     Sintomas<hr class="bg-black"></th>
           <th class="w-52 ">               Tratamientos<hr class="bg-black"></th>
           <th class="w-52 ">               Productos<hr class="bg-black"></th>
        </tr>
   </thead>
   <!-- ................................................................................................... -->
   <tbody class="tbody">
   @foreach($visitas as $visita)  

        <?php $color= $visita->id % 2;?>       
   
        <tr  @if ($color== 1) class="bg-white" @else class="bg-gray-200" @endif>
               <td class="">               {{$visita->id}}</td> 
               <td class="text-center">    {{$visita->fecha}}</td>
               <td class="text-center">    {{$visita->user_id}}</td>
               <td class="text-left">      {{$visita->user->name}}</td>
               <td class="text-left">      {{$visita->user->apellido}}</td>
               <td class="text-center">    {{$visita->user->origen_id}}</td>
               <!--<td class="text-left">      {{$visita->user->origen->descorigen}}</td>-->
               <td class="text-left">      {{$visita->sintomas}}</td>
               <!--................................................................................................ -->
               <td class="text-center" >
                    <?php if( $desplegar== 0) { ?> {{$visita->tratamientos->pluck('tratamiento')->count()}} <?php } ?>
                            <?php if(isset($_REQUEST['btndesplegar'])){ ?>
                            <?php $vis= Visita::find($visita->id); ?>
                                @foreach( $vis->tratamientos as $tratamiento)
                                    <table>
                                            <td>{{$tratamiento->id}}</td>
                                            <td>{{$tratamiento->tratamiento}}</td>
                                    </table>    
                                @endforeach
                            <?php } ?>        
               </td>
               <!--.................................................................................................. -->
               <td class="text-center">
                    <?php if( $desplegar== 0) { ?> {{$visita->productos->pluck('nombre')->count()}} <?php } ?>
                            <?php if(isset($_REQUEST['btndesplegar'])){ ?>
                            <?php $vis= Visita::find($visita->id); ?>
                                @foreach( $vis->productos as $producto)
                                    <table>
                                            <td>{{$producto->id}}</td>
                                            <td>{{$producto->nombre}}</td>
                                    </table>    
                                @endforeach
                            <?php } ?>        
               </td>
               <!--.................................................................................................... -->
               <td><a href="{{route('visitas.editar',$visita)}}">Editar</a></td>
               <!--.................................................................................................... -->
        </tr>
               <!-- ................................................................................................... -->
   @endforeach
   
   </tbody>
   </table>
@endif   




</x-app-layout>

</body>
</html>
