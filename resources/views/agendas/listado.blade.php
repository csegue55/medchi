<?php
use App\Models\Sesion;
use App\Models\Tratamiento;
use App\Models\User;
use App\Models\Visita;

$desplegar= 0;              // Desplegado = 1 + plegado = 0 . Quita la linea única de count() y pone los registros. 
$_SESSION['recoger']="";    // Función Buscar. Recoge el nombre a buscar del input.
$buscar=0;                  // Sólo pone los registros cuando busco un nombre en el botón de buscar.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <style>
        .table{
            width: 80%;
            height: 25px;
        }
        .table, td{
            border: 1.2px solid #E7E5E5;
            border-collapse: collapse;
        }
        /*table tbody tr:nth-child(odd) { background: #ffffff;}
        table tbody tr:nth-child(even) {background: #F6F2F1;}*/
    </style>

</head>
<body>


 





<!-- Plegar y Desplegar -->
<!-- ****************************************************************************************************** -->
    <form action="" method="">
                <input class="bg-blue-500 px-2 py-2 mr-4" type="submit" value="Desplegar" name="btndesplegar">
                <?php if(isset($_REQUEST['btndesplegar'])){ ?>
                    <input class="bg-red-300 px-2 py-2 mr-4" type="submit" value="Plegar" name="btnplegar">
                    <?php $desplegar=1; ?>
                <?php } ?>        
    </form>


<!-- Buscar -->
<!-- ****************************************************************************************************** -->

    <form action="" method="GET">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>    @csrf
            
            <input class="mt-10 w-96 px-2 py-2 mr-4" type="text" value="" name="nombre">
            <input class="bg-green-300 w-24 px-2 py-2 mr-4" type="submit" value="Buscar"  name="btnbuscar">
            <!-- .......................................................................................... -->       

    <?php    
    if(isset($_REQUEST['btnbuscar']))
    {
                  $_SESSION['recoger']= $_GET["nombre"];
                  if(  ($users= User::where('name', 'like', '%'. $_SESSION['recoger'].'%')->get()  )->count() == 0  ){
                  echo "No hay coincidencias";
                  }
    ?>   
    <!-- ........................................................................................................... -->              
             
    <table class="table ">
    <thead>
          <tr>
              <th>id</th>
              <th>Cliente</th>
              <th>Origen</th>
              <th>Sesiones</th>
              <th>Tratamiento</th>
              <th>Productos</th>
          </tr>
    </thead>
    <!-- ........................................................................................................... -->
    <tbody class="tbody">

               <?php $buscar=1; ?>   
               @foreach($users as $user) 
                    <?php $visita= Visita::where('id', $user->id)->first()  ?>
        <tr>
                <td class="bg-white" >{{$visita->id}}</td> 
                <td class="bg-white" >{{$visita->user->name}}</td>
                <td class="bg-white" >{{$visita->origen->descorigen}}</td>

                <!-- Sesiones -->
                <!--................................................................................................ -->
                <td 
                        class="bg-white text-center" >
                        <!-- <?php //if( $desplegar== 0) { ?> {{$visita->sesions->count()}} <?php //} ?> -->
                        <?php //if(isset($_REQUEST['btndesplegar']) )
                        //{ ?>
                            <?php $sesions= Sesion::where('visita_id', $visita->id )->orderBy('fecha','asc')->get(); ?>                           
                                @foreach($sesions as $ses)
                                    @if( $visita->id == $ses->visita_id )
                                    <table>
                                        <tr>
                                            <td>{{$ses->fecha}}</td>
                                        </tr>
                                    </table>
                                    @endif
                                @endforeach
                        <?php //} ?>        
                </td>

                <!-- Tratamientos -->
                <!--................................................................................................ -->
                
                <td class="bg-white text-center" >
                            <?php if( $desplegar== 0) { ?> {{$visita->tratamientos->pluck('tratamiento')->count()}} <?php } ?>
                            <?php //if(isset($_REQUEST['btndesplegar']) ) 
                            //{ ?>
                                <?php $vis= Visita::find($visita->id); ?>
                                @foreach( $vis->tratamientos as $tratamiento)
                                    <table>
                                        <tr>
                                        <td>{{$tratamiento->id}}</td>
                                        <td>{{$tratamiento->tratamiento}}</td>
                                        </tr>
                                    </table>    
                                @endforeach
                            <?php //} ?>
                </td>
                <!--................................................................................................ -->
                <td class="bg-white text-center" >
                            <?php if( $desplegar== 0) { ?> {{$visita->productos->pluck('name')->count()}} <?php } ?>
                            <?php //if(isset($_REQUEST['btndesplegar']) ) 
                            //{ ?>
                                <?php $vis2= Visita::find($visita->id); ?>
                                @foreach( $vis2->productos as $producto)
                                    <table>
                                        <tr>
                                        <td>{{$producto->id}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        </tr>
                                    </table>    
                                @endforeach
                            <?php //} ?>
                </td>
     
        </tr>
                <!-- ................................................................................................... -->                
                </tr>
        @endforeach
    </tbody>
    </table>

                 
                 
    <?php } ?> <!-- if btnbuscar -->
    </form>

    





<!-- Listado sin buscar -->   
<!-- ****************************************************************************************************** -->

<!-- Botodes -->
<!-- ****************************************************************************************************** -->
   @if($buscar == 0 )
   
    <table class="table ">
    <thead>
        <tr>
            <th>id</th>
            <th>Cliente</th>
            <th>Origen</th>
            <th>Sesiones</th>
            <th>Tratamiento</th>
            <th>Productos</th>
        </tr>
    </thead>
    <!-- ................................................................................................... -->
    <tbody class="tbody">
    @foreach($visitas as $visita)    
    
            <tr>
                <td class="bg-white" >{{$visita->id}}</td> 
                <td class="bg-white" >{{$visita->user->name}}</td>
                <td class="bg-white" >{{$visita->origen->descorigen}}</td>
                <!--................................................................................................ -->
                <td 
                        class="bg-white text-center" >
                        <?php if( $desplegar== 0) { ?> {{$visita->sesions->count()}} <?php } ?>
                        <?php if(isset($_REQUEST['btndesplegar'])){ ?>
                            <?php $sesions= Sesion::where('visita_id', $visita->id )->orderBy('fecha','asc')->get(); ?>                           
                                @foreach($sesions as $ses)
                                    @if( $visita->id == $ses->visita_id )
                                    <table>
                                        <tr>
                                            <td>{{$ses->fecha}}</td>
                                        </tr>
                                    </table>
                                    @endif
                                @endforeach
                        <?php } ?>        
                </td>
                <!--................................................................................................ -->
                
                <td class="bg-white text-center" >
                            <?php if( $desplegar== 0) { ?> {{$visita->tratamientos->pluck('tratamiento')->count()}} <?php } ?>
                            <?php if(isset($_REQUEST['btndesplegar'])){ ?>
                                <?php $vis= Visita::find($visita->id); ?>
                                @foreach( $vis->tratamientos as $tratamiento)
                                    <table>
                                        <tr>
                                        <td>{{$tratamiento->id}}</td>
                                        <td>{{$tratamiento->tratamiento}}</td>
                                        </tr>
                                    </table>    
                                @endforeach
                            <?php } ?>
                </td>
                <!--................................................................................................ -->
                <td class="bg-white text-center" >
                            <?php if( $desplegar== 0) { ?> {{$visita->productos->pluck('name')->count()}} <?php } ?>
                            <?php if(isset($_REQUEST['btndesplegar'])){ ?>
                                <?php $vis2= Visita::find($visita->id); ?>
                                @foreach( $vis2->productos as $producto)
                                    <table>
                                        <tr>
                                        <td>{{$producto->id}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        </tr>
                                    </table>    
                                @endforeach
                            <?php } ?>
                </td>
                <td>
                        <td><a href="{{route('agendas.editar', $visita->id)}}">Editar</a></td>
                </td>
            </tr>
                <!-- ................................................................................................... -->
 
    @endforeach
    
    </tbody>
    <!-- ................................................................................................... -->
    </table>
    @endif
   
</body>
</html>





























