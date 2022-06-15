<?php
if(!isset($_SESSION)) {
    session_start();
}

use App\Models\Producto;
use App\Models\Tratamiento;
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

    <div class="flex justify-center ">
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('users.listado')}}">PACIENTES</a></div>
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('tratamientos.listado')}}">TRATAMIENTOS</a></div>
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('productos.listado')}}">PRODUCTOS</a></div>
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('origenes.listado')}}">ORIGENES</a></div>
        <div><a class="border border-black px-2 py-2 mb-60 mr-4" href="{{route('visitas.listado')}}">VISITAS</a></div>
    </div>
    <br>
    <hr class="bg-red-900 h-1 mx-4">
        <div class="text-center">VISITA</div>
    <hr class="bg-red-900 h-1 mx-4">
<!-- ................................................................................................................... -->

<!-- DATOS -->
<!-- ..................................................................................................................................... -->  
            @foreach($visitas_id as $visita)
            <form action="{{route('visitas.update', $visita)}}" method="post">            
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>    @csrf
                    <input type="hidden" name="_method" value="PUT"/>                  @method('put')
<!-- ................................................................................................................... -->
<div class="">
<div class="container mx-auto">
<div class="grid grid-cols-4 grid-rows-14">  
   
        <!-- ..................................................................................................................................... -->                    
    <div class="row-span-6 border-2 border-slate-200 ml-4 shadow-lg shadow-slate-400
                relative">
        <table>
                <input class="w-52" name="id"  hidden   value="{{$visita->id}}">
                <tr><td class="w-32 text-left "> Visita    :</td><td class="text-left">    <?php echo $visita->id ?></td><tr> 

                <tr><td class="w-32 text-left "> Fecha     :</td><td class="text-left">    <input class="w-52" name="fecha"     disabled value="{{$visita->fecha}}"></td><tr>
                <tr><td class="w-32 text-left "> Nº_Cli    :</td><td class="text-left">    <input class="w-52" name="user_id"   disabled value="{{$visita->user_id}}"></td><tr>
                <tr><td class="w-32 text-left "> Nombre    :</td><td class="text-left">    <input class="w-52" name="name"      disabled value="{{$visita->user->name}}"></td><tr>
                <tr><td class="w-32 text-left "> Apellido  :</td><td class="text-left">    <input class="w-52" name="apellido"  disabled value="{{$visita->user->apellido}}"></td><tr>
                <tr><td class="w-32 text-left "> Nº_Origen :</td><td class="text-left">    <input class="w-52" name="origen_id" disabled value="{{$visita->user->origen_id}}"></td><tr>
                <tr><td class="w-32 text-left "> Origen    :</td><td class="text-left">    <input class="w-52" name="origen"    disabled value="{{$visita->user->origen->descorigen}}"></td><tr>
            @endforeach
        </table>    
        <!-- ............................................................................................................ --> 
        <div class="absolute bottom-10 left-0">
          <input class="bg-slate-900 rounded-sm text-white w-80 ml-4 mb-5 py-3" type="submit" name="" value="EDITAR"/>
        </div>  
        <!-- ............................................................................................................ -->  
        <div class="absolute bottom-2">
          <a class="text-center border-2 border-green-500 px-28 py-2 ml-6 mb-8" href="{{route('visitas.factura', $visita->id)}}"> - Factura - </a>
        </div>  
        <!-- ............................................................................................................ -->  
    </div>
    <!-- ..................................................................................................................................... -->
    <div class="col-span-3 border-2 border-slate-200 ml-1 mr-4">
    <?php $tratamientos= Tratamiento::all();
        $cont= count($visita->tratamientos); 
        //echo $cont; echo "<br>";
        ?>
        <div class="bg-gray-300">Tratamientos</div>
        @foreach($tratamientos as $trat)
            <?php //for($i=0; $i<($visita->tratamientos->pluck('tratamiento')->count()); $i++) { ?>
            <?php $saltar= 0;?>

            <?php for($i=0; $i<count($visita->tratamientos); $i++) { ?>    
                    @foreach($visita->tratamientos as $tratamiento)
                            <?php if($trat->id == $tratamiento->pivot->tratamiento_id) { ?>
                                <div class="inline-block">
                                <table>
                                    <input class="" type="checkbox" id="" name="trat[]" value= "{{$trat->id}}" checked>
                                    <div class="inline-block mt-2 ml-1"> {{$trat->tratamiento}}</div>
                                </table>
                                </div>
                                <?php $i= $cont; $saltar= 1;?>
                            <?php } ?>
                    @endforeach    
            <?php } ?>

            <?php if($saltar == 0) { ?>   
                            <div class="inline-block">
                                <table>
                                    <input class="" type="checkbox" id="" name="trat[]" value= "{{$trat->id}}">
                                    <div class="inline-block mt-2 ml-1"> {{$trat->tratamiento}}</div>
                                </table>
                            </div>
                            <?php $saltar= 0; ?>
            <?php } ?>
        @endforeach        
    </div>
    <!-- ..................................................................................................................................... -->
    <div class="col-span-3 border-2 border-slate-200 ml-1 mr-4">
        <!--
            @foreach( $visita->productos as $producto)
                <div class="inline-block">
                <table>
                        <input class="" type="checkbox" id="" name="" value= "{{$producto->id}}" checked>
                        <div class="inline-block mt-2 ml-1"> {{$producto->nombre}}</div>
                </table>
                </div>    
            @endforeach
        -->
   
            <?php $productos= Producto::all();
            $cont2= count($visita->productos); 
            //echo $cont2; echo "<br>";
            ?>
            <div class="bg-gray-300">Productos</div>  
            @foreach($productos as $pro)
                <?php //for($i=0; $i<($visita->productos->pluck('producto')->count()); $j++) { ?>
                <?php $saltar2= 0;?>

                <?php for($j=0; $j<count($visita->productos); $j++) { ?>    
                        @foreach($visita->productos as $producto)
                                <?php if($pro->id == $producto->pivot->producto_id) { ?>
                                    <div class="inline-block">
                                    <table>
                                        <input class="" type="checkbox" id="" name="pro[]" value= "{{$pro->id}}" checked>
                                        <div class="inline-block mt-2 ml-1"> {{$pro->nombre}}</div>
                                    </table>
                                    </div>
                                    <?php $j= $cont2; $saltar2= 1;?>
                                <?php } ?>
                        @endforeach    
                <?php } ?>

                <?php if($saltar2 == 0) { ?>   
                                <div class="inline-block">
                                    <table>
                                        <input class="" type="checkbox" id="" name="pro[]" value= "{{$pro->id}}">
                                        <div class="inline-block mt-2 ml-1"> {{$pro->nombre}}</div>
                                    </table>
                                </div>
                                <?php $saltar2= 0; ?>
                <?php } ?>
            @endforeach 
    </div>
    <!-- ..................................................................................................................................... -->
    <div class="col-span-3 row-span-2 border-2 border-slate-200 ml-1 mr-4">
            <div class="flex flex-col">
            <div class="bg-gray-300">Síntomas</div>    
            @foreach($visitas_id as $visita)
                <textarea class="border-0 w-full" rows="4" type="text" name="sintomas" value="">{{$visita->sintomas}}</textarea>
            @endforeach
            </div>
    </div>
    <!-- ..................................................................................................................................... -->
    <div class="col-span-3 row-span-2 border-2 border-slate-200 ml-1 mr-4 shadow-lg shadow-slate-400">
            <div class="flex flex-col">
            <div class="bg-gray-300">Observaciones</div>   
            @foreach($visitas_id as $visita)
                <textarea class="border-0 w-full" rows="4" type="text" maxlength="500" name="observaciones" value="">{{$visita->observaciones}}</textarea>
            @endforeach
            </div>
    </div>
</div>
</div>
</div>
<!-- ..................................................................................................................................... -->
<!-- ................................................................................................................. -->
<!-- ................................................................................................................. -->
</form>  



<!-- HISTORIAL -->
<!-- ................................................................................................................... -->   
    <hr class="bg-blue-900 h-1 mx-4 mt-20">
    <div class="flex flex-row">
        <div class="border-0 text-center ml-4 w-20">Visita</div> 
        <div class="border-0 text-center ml-4 w-40">Fecha</div> 
        <div class="">VISITAS ANTERIORES SINTOMAS/OBSERVACIONES</div>
    </div> 
    <hr class="bg-blue-900 h-1 mx-4">

@foreach($visitas_user_id as $visita_user_id)
<!-- ..................................................................................................................................... -->  
<div class="container mx-auto">
<div class="grid grid-cols-4 grid-rows-6">  
    @if($visita_user_id->id <> $visita->id) 
        <!-- ..................................................................................................................................... -->                    
    <div class="row-span-6 border-2 border-slate-200 ml-4 bg-slate-200">
            <div class="flex flex-row"> 
                <div class="border-0 w-20 text-center">{{$visita_user_id->id}}</div>  
                <div class="border-0 w-40 text-center">{{$visita_user_id->fecha}}</div>  
            </div>           
    </div>
    <!-- ..................................................................................................................................... -->
    <div class="col-span-3 border-2 border-slate-200 ml-1 mr-4">
            <?php $visita4= $visita_user_id; ?>
                    <?php $tratamientos4= Tratamiento::all(); ?>
                    @foreach($tratamientos4 as $tratamiento4)
                        @foreach($visita4->tratamientos as $tratamiento5)
                    
                            <?php if($tratamiento4->id == $tratamiento5->pivot->tratamiento_id) { ?>
                                <div class="inline-block">
                                <table>
                                    <input class="" type="checkbox" id="" name="" value= "" checked>
                                    <div class="inline-block mt-2 ml-1"> {{$tratamiento4->tratamiento}}</div>
                                </table>
                                </div>
                            <?php } ?>    
                        @endforeach
                    @endforeach         
    </div>
    <!-- ..................................................................................................................................... -->
    <div class="col-span-3 border-2 border-slate-200 ml-1 mr-4">
            <?php $visita5= $visita_user_id; ?>
                    <?php $productos4= Producto::all(); ?>
                    @foreach($productos4 as $producto4)
                        @foreach($visita5->productos as $producto5)
                    
                            <?php if($producto4->id == $producto5->pivot->producto_id) { ?>
                                <div class="inline-block">
                                <table>
                                    <input class="" type="checkbox" id="" name="" value= "" checked>
                                    <div class="inline-block mt-2 ml-1"> {{$producto4->nombre}}</div>
                                </table>
                                </div>
                            <?php } ?>    
                        @endforeach
                    @endforeach         
    </div>
    <!-- ..................................................................................................................................... -->
    <div class="col-span-3 row-span-2 border-2 border-slate-200 ml-1 mr-4">
            {{$visita_user_id->sintomas}}        
    </div>
    <!-- ..................................................................................................................................... -->
    <div class="col-span-3 row-span-2 border-2 border-slate-200 ml-1 mr-4">
                    {{$visita_user_id->observaciones}}                    
    @endif
    </div>
    <!-- ..................................................................................................................................... -->
</div>
</div>
<!-- ..................................................................................................................................... --> 
<hr class="bg-blue-900 h-1 mx-4"> 
@endforeach

<br><br><br><br><br><br><br>

</x-app-layout>
</body>
</html>