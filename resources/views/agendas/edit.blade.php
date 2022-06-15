<?php
use App\Models\Sesion;
use App\Models\Visita;

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
        
</body>
</html>
<!-- Datos -->   


        <h3 class="text-center text-bold text-2xl">Edición campos de clientes</h3>
        <hr class="bg-gray-700 h-1 w-full mx-auto">


<div class="container">
<div class="grid grid-cols-2">

<div class="bg-blue-200">USUARIOS
        <!-- Users -->
        <!-- .................................................................................................................................. -->
        <table>
                <tr>
                        <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-20"  type="text" disabled placeholder="Campos">
                        <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-72"  type="text" disabled placeholder="Datos">
                </tr>
        </table>     
        <table> 
                <tr>
                    <td><div class="h-5 w-20 mb-0 border-0 bg-red-100">id :</div></td>
                    <td><div class=""><input class="h-5 mb-0 border-0 bg-gray-200 w-72" type="text" disabled name="id" value="{{$visita->user->id}}"></div></td>
                </tr>
                <tr>
                    <td><div class="h-5 w-20 mb-0 border-0 bg-red-100">Nombre :</div></td>
                    <td><div class=""><input class="h-5 mb-0 border-0 bg-gray-200 w-72" type="text" disabled name="name" value="{{$visita->user->name}}"></div></td>
                </tr>
                <tr>
                    <td><div class="h-5 w-20 mb-0 border-0 bg-red-100">Apellido :</div></td>
                    <td><div class=""><input class="h-5 mb-0 border-0 bg-gray-200 w-72" type="text" disabled name="apellido" value="{{$visita->user->apellido}}"></div></td>
                </tr>
                <tr>
                    <td><div class="h-5 w-20 mb-0 border-0 bg-red-100">Tfno :</div></td>
                    <td><div class=""><input class="h-5 mb-0 border-0 bg-gray-200 w-72" type="text" disabled name="tfno" value="{{$visita->user->tfno}}"></div></td>
                </tr>
                <tr>
                    <td><div class="h-5 w-20 mb-0 border-0 bg-red-100">email :</div></td>
                    <td><div class=""><input class="h-5 mb-0 border-0 bg-gray-200 w-72" type="text" disabled name="email" value="{{$visita->user->email}}"></div></td>
                </tr>
                <tr>
                    <td><div class="h-5 w-20 mb-0 border-0 bg-red-100">Rol :</div></td>
                    <td><div class=""><input class="h-5 mb-0 border-0 bg-gray-200 w-72" type="text" disabled name="rol" value="{{$visita->user->rol}}"></div></td>
                </tr>
                <tr>
                    <td><div class="h-5 w-20 mb-0 border-0 bg-red-100">Contador :</div></td>
                    <td><div class=""><input class="h-5 mb-0 border-0 bg-gray-200 w-72" type="text" disabled name="cont" value="{{$visita->user->cont}}"></div></td>
                </tr>
        
        <!-- Origen -->
        <!-- .................................................................................................................................. -->
                <tr>
                    <td><div class="h-5 w-20 mb-0 border-0 bg-red-100">Origen :</div></td>
                    <td><input class="h-5 mb-0 border-0 bg-gray-200 w-72" type="text" disabled   name="id" value="{{$visita->origen->descorigen}}"></td>
                </tr>
        </table>           
        </div>

        <!-- Origen -->
        <!-- .................................................................................................................................. -->        
        <!--
        <div class="bg-blue-500">ORIGEN
                    <table>
                         <tr>
                         <td><input class="h-5 mb-0 border-0 bg-gray-200 w-80" type="text" disabled   name="id" value="{{$visita->origen->descorigen}}"></td>
                         </tr>
                    </table>          
        </div>
        -->

</div>
</div>




<div class="container">
<div class="grid grid-cols-4">

        <div class="bg-blue-300">SESIONES
        <!-- Sesiones -->
        <!-- .................................................................................................................................. -->
        <table class=""> 
        <tr>
                <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-12"  type="text" disabled placeholder="id">
                <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-24"  type="text" disabled placeholder="Nº Cliente">
                <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-28"  type="text" disabled placeholder="fecha">
        </tr>
        </table>    
        <?php $sesions= Sesion::where('visita_id', $visita->id )->orderBy('fecha','asc')->get(); ?>                           
                 @foreach($sesions as $ses)
                     @if( $visita->id == $ses->visita_id )
                     <table>
                         <tr>
                         <td><input class="h-5 mb-0 border-0 bg-gray-200 w-12" type="text" disabled   name="id"             value="{{$ses->id}}"></td>
                         <td><input class="h-5 mb-0 border-0 bg-gray-200 w-24" type="text" disabled   name="visita_id"      value="{{$ses->visita_id}}"></td>
                         <td><input class="h-5 mb-0 border-0 bg-gray-200 w-28" type="text" disabled   name="fecha"          value="{{$ses->fecha}}"></td>
                         </tr>
                     </table>
                     @endif
                 @endforeach

        </div>
        
        
        <div class="col-span-2  bg-blue-400">TRATAMIENTOS


        <!-- Tratamientos -->
        <!-- .................................................................................................................................. -->
        <table class=""> 
        <tr>
                <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-12"  type="text" disabled placeholder="id">
                <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-30 " type="text" disabled placeholder="Tratamiento">
                <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-80"  type="text" disabled placeholder="Descripción">
                <th class="cursor-pointer text-center"><input class="h-6 border-0 bg-red-100 w-20"  type="text" disabled placeholder="PVP">
        </tr>
        </table>    
                <?php $vis= Visita::find($visita->id); ?>
                @foreach( $vis->tratamientos as $tratamiento)
                     <table>
                         <tr>
                         <td><input class="h-5 mb-0 border-0 bg-gray-200 w-12" type="text" disabled   name="id"             value="{{$tratamiento->id}}"></td>
                         <td><input class="h-5 mb-0 border-0 bg-gray-200 w-30" type="text" disabled   name="fecha"          value="{{$tratamiento->tratamiento}}"></td>
                         <td><input class="h-5 mb-0 border-0 bg-gray-200 w-80" type="text" disabled   name="visita_id"      value="{{$tratamiento->descripcion}}"></td>
                         <td><input class="h-5 mb-0 border-0 bg-gray-200 w-20" type="text" disabled   name="visita_id"      value="{{$tratamiento->pretrat}}"></td>
                         </tr>
                     </table>
                 @endforeach

        </div>

        <div class="bg-blue-200">PRODUCTOS
        <!-- Productos -->
        <!-- .................................................................................................................................. -->
                <?php $vis2= Visita::find($visita->id); ?>
                @foreach( $vis2->productos as $producto)
                    <table>
                        <tr>
                        <td><input class="h-5 mb-0 border-0 bg-gray-200 w-60" type="text" disabled   name="fecha" value="{{$producto->nombre}}"></td>
                        </tr>
                    </table>    
                @endforeach

</div>                                
</div>






