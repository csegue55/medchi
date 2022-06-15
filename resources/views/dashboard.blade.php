<?php
if(!isset($_SESSION)) {
    session_start();
}    
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medchi</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>

<!--
    x-app-layout
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
    /x-app-layout
-->


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <img class="bg-cover bg-center mr-auto ml-auto" style="height: 350px; width: 600px; "; src="{{asset('img/dashboard.jpg')}}" alt="">

                @if (Auth::check()) 
<?php
                    $_SESSION['login']=array();
                    $_SESSION['login']['u_id'] = auth()->user()->id;
                    $_SESSION['login']['u_nom']= auth()->user()->name;
                    $_SESSION['login']['u_ape']= auth()->user()->apellido;       
                    $_SESSION['login']['u_tel']= auth()->user()->tfno;      
                    $_SESSION['login']['u_ema']= auth()->user()->email;      
                    $_SESSION['login']['u_rol']= auth()->user()->rol;    
                    $_SESSION['login']['u_con']= auth()->user()->cont;    

                    echo "id_Usuario :"   .$_SESSION['login']['u_id'];   echo"<br>";
                    echo "Nom_Usu :"      .$_SESSION['login']['u_nom'];  echo"<br>";
                    echo "apellido_Usua :".$_SESSION['login']['u_ape'];  echo"<br>";
                    echo "telefono_usu :" .$_SESSION['login']['u_tel'];  echo"<br>";
                    echo "email_Usuari :" .$_SESSION['login']['u_ema'];  echo"<br>";
                    echo "rol_Usuari :"   .$_SESSION['login']['u_rol'];  echo"<br>";
                    echo "rol_Contador :" .$_SESSION['login']['u_con'];  echo"<br>";

                    $numInicio= auth()->user()->id;
                    //$cont= User::where('id', $numInicio)->get();   => no recoge los datos
                    $user= User::find($numInicio);
                    $contador= $user->cont + 1;
                    $user->cont= $contador;
                    $user->save();
?>
                    
                
                    <div class="container">
                    <div class="grid grid-cols-7 bg-red-200">
                        <div class=" col-start-4 col-span-2 rounded text-sm lg:text-lg" >
                            <p class="text-blue font-bold ml-1">Bienvenid@ : <?php echo $_SESSION['login']['u_nom'];?></p>     
                        </div>      
                    </div>  
                    </div>          
                
                
                
                @else
                    <p class="text-blue-900">.</p>
                @endif 

                <div class="container">
                <div class="grid grid-cols-7 bg-red-200">
                    <div class=" col-start-4 col-span-2 rounded " >
                        <form action="{{route('inicio.welcome')}}" method="GET">
                            @csrf
                            <button class="text-center border-2 ml-1 py-4 px-2" type="submit">Ir a la aplicación</button>
                        </form>
                    </div>      
                </div>  
                </div>


            </div>
        </div>
    </div>

</body>
</html>
