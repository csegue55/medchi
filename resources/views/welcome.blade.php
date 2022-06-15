<?php
if(!isset($_SESSION)) {
    session_start();
}

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WINELABEL</title>

    <style>
            .imagen{background-image: url("{{asset('img/fondo3.jpg')}}"); height: 150px; width: auto; }
    </style>

    <title></title>

    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/animaciones.css')}}">

    <script src="{{asset('js/jquery-3.2.1.js')}}"></script>    <!-- slider -->



</head>

<body class="imagen bg-cover bg-no-repeat "> <!--imagen bg-cover bg-no-repeat">-->

<x-app-layout>

<!-- BANNER -->
<!-- ....tailwind.config.js ............................................................................................ -->
<!-- ................................................................................................................... -->

    <div class="flex justify-between bg-blue-900">
        <p class="text-blue-900">..................</p>
        <p class="animate-show-banner-text2 text-white  font-bold ml-10">TU PAGINA DE TERAPIA</p>
        @if (Auth::check())
        <p class="text-white font-bold mr-10 text-sm">Bienvenid@ : <?php echo $_SESSION['login']['u_nom'];?></p>   
        @else
        <p class="text-blue-900">.</p>
        @endif                     
    </div>






<!-- MENSAJE BAJO BANNER -->
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->

    <div class="container"> 
               
    <div class="h-auto 
                lg:h-96
                grid grid-cols-6">

         <div class=" mt-4 h-20"></div>
         
         <div class="mt-4 h-20 col-start-3 col-span-2"> 
                <div class="font-serif
                            text-center text-xs font-bold lg:text-2xl text-blue-800 
                            mx-auto"
                            style="background: rgba(255,255,255,0.3)";>     
                    MEDICINA TRADICIONAL CHINA
                    <hr class="bg-gray-700 h-1 w-2/3 mx-auto">
                    3000 AÑOS A TU SERVICIO<br>
                    <span class="icon-address-card-o"></span> 
                </div>
         </div>
       
         <div class="mx-auto mt-6 
                     col-span-2 col-start-5 lg:col-start-6 ">
                    <a href="">
                        <img class="rounded-full mx-auto"  
                        style="height: 100px"; 
                        src="{{url('img/Isabel.jpg') }}">
                    </a>
                    <img class="mt-2 lg:mt-4"
                        src="{{url('img/ESMTC_-01.png') }}"
                        style="height: 50px; background: rgba(255,255,255,0.6);">    
                    <img class="mt-2 lg:mt-4"
                        src="{{url('img/uea.svg') }}"
                        style="height: 50px; background: rgba(255,255,255,0.6);">    
         </div> 
    </div>
    </div>

<!-- ESPACIADOR  .................................................... -->
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->

    <div class="w-auto h-10 lg:h-96
                lg:mb-20  ">
    </div>


<!-- SLIDER AUTOMATICO - CAROUSEL public/css/slider.css ................................................................ -->
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->
<div class="w-auto bg-transparent">
    <div class="container"> 
    <div class=" sm:grid grid-rows-1 md:grid grid-cols-7 
                 my-auto
                 h-60 lg:h-96
                 ">
         <!-- ................................................................................................... -->
            <div class="c-slider 
                    col-start-2 col-span-5 
                    mx-auto 
                    bg-cover bg-center object-fill overflow-hidden
                    h-60 lg:h-96
                    "> 
 
                <div class="slider">
                <ul>                                                            <!-- bg-cover bg-center object-fill overflow-hidden -->
                    <li> <img class="" src="{{asset('img/slider01.jpg')}}" alt=""></li>
                    <li> <img class="" src="{{asset('img/slider02.jpg')}}" alt=""></li>
                    <li> <img class="" src="{{asset('img/slider03.jpg')}}" alt=""></li>
                    <li> <img class="" src="{{asset('img/slider04.jpg')}}" alt=""></li> 
                    <li> <img class="" src="{{asset('img/slider05.jpg')}}" alt=""></li>
                    <li> <img class="" src="{{asset('img/slider06.jpg')}}" alt=""></li>
                    <li> <img class="" src="{{asset('img/slider07.jpg')}}" alt=""></li>
                    <li> <img class="" src="{{asset('img/slider08.jpg')}}" alt=""></li>
                    <li> <img class="" src="{{asset('img/slider09.jpg')}}" alt=""></li>
                    <li> <img class="" src="{{asset('img/slider10.jpg')}}" alt=""></li>

                </ul>
                </div>
            </div>
    </div>
    </div>    
</div>

<!-- CARDS -->
<!-- ....resources/css/app.css  + tailwindconfig.js .................................................................... -->
<!-- ................................................................................................................... -->
    <!--## -->
    <div class="container pt-2 mx-auto">
    <div class="container-card ">
        <!-- --------------------------------------------------------------------- -->
        <div class="group APP-card mr-4 ml-4">
            <p  class="APP-card-icon
                       group-hover:text-blue-700
                       transform group-hover:scale-125
                       group-hover:animate-show-card-icon">
                       <span class="icon-twitter"></span>
            </p>
            
            <h2 class="APP-card-h2   
                      group-hover:text-white
                       group-hover:animate-show-card-h2">
                       Tratamientos
            </h2>
            
            <p  class="APP-card-p 
                      group-hover:text-white">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores eos nulla repellat dignissimos
            </p>

        </div>
        <!-- --------------------------------------------------------------------- -->
        <div class="group APP-card mr-4 ml-4">
            <p  class="APP-card-icon
                       group-hover:text-blue-700
                       transform group-hover:scale-125
                       group-hover:animate-show-card-icon">
                       <span class="icon-android"></span>
            </p>

            <h2 class="APP-card-h2   group-hover:text-white
                       group-hover:animate-show-card-h2">
                       Acupuntura
            </h2>

            <p  class="APP-card-p    group-hover:text-white">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores eos nulla repellat dignissimos
            </p>
        </div>
        <!-- --------------------------------------------------------------------- -->
        <div class="group APP-card mr-4 ml-4">

            <p  class="APP-card-icon
                       group-hover:text-blue-700
                       transform group-hover:scale-125
                       group-hover:animate-show-card-icon">
                       <span class="icon-food"></span>
            </p>

            <h2 class="APP-card-h2   group-hover:text-white
                       group-hover:animate-show-card-h2">
                       ¿Por qué?
            </h2>

            <p  class="APP-card-p    group-hover:text-white">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores eos nulla repellat dignissimos
            </p>

        </div>
        <!-- --------------------------------------------------------------------- -->
        <div class="group APP-card mr-4 ml-4">

            <p  class="APP-card-icon
                       group-hover:text-blue-700
                       transform group-hover:scale-125
                       group-hover:animate-show-card-icon">
                       <span class="icon-trash-empty"></span>
            </p>

            <h2 class="APP-card-h2   group-hover:text-white
                       group-hover:animate-show-card-h2">
                       Contacto
            </h2>
            
            <p  class="APP-card-p    group-hover:text-white">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores eos nulla repellat dignissimos
            </p>
   
        </div>
        <!-- ---------------------------------------------------------------------
        <div class="group APP-card ">
        <p  class="APP-card-icon
                       group-hover:text-blue-700
                       transform group-hover:scale-125
                       group-hover:animate-show-card-icon">
                       <span class="icon-basket"></span>
            </p>
            <h2 class="APP-card-h2   group-hover:text-white
                       group-hover:animate-show-card-h2">Desarrollo web</h2>
            <p  class="APP-card-p    group-hover:text-white">Aprender diatintos lenguajes1</p>
        </div>
        -->
        <!-- ---------------------------------------------------------------------
        <div class="group APP-card ">
        <p  class="APP-card-icon
                       group-hover:text-blue-700
                       transform group-hover:scale-125
                       group-hover:animate-show-card-icon">
                       <span class="icon-search"></span>
            </p>
            <h2 class="APP-card-h2   group-hover:text-white
                       group-hover:animate-show-card-h2">Desarrollo web</h2>
            <p  class="APP-card-p    group-hover:text-white">Aprender diatintos lenguajes1</p>
        </div>
        -->
        <!-- ---------------------------------------------------------..----------- -->


    </div>
    </div>
 

<!-- MOSAICO IMAGEN -->
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->

    <div class="container mt-20">
    <div class="grid grid-cols-3 grid-rows-3 
                bg-cover bg-center object-fill 
                mr-8 ml-8 "
                style="background-image: url(http://localhost/medchi/public/img/fondo.jpeg)">

            <div class="col-span-2 border-4   border-white"></div>
            <div class="row-span-3 border-4   border-white"></div>
            <div class="row-span-3 border-4   border-white"></div>
            <div class="row-span-2 border-4   border-white">
                <a href="">
                <div class="text-center" style="background: rgba(255,255,255,0.5)";>
                    <div class="py-10 px-4">
                        <p class="font-bold text-sm uppercase">Contacta</p>
                        <p class="sm:text-sm lg:text-3xl font-bold">Te explicamos</p>
                        <p class="sm:text-sm lg:text-3xl mb-6 leading-none">nuestras soluciones</p>
                        </a>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-span-2 h-44  border-4  border-white"></div>
    
    </div>
    </div>

<!-- TARJETA PRESENTACION -->
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->
    <div class="container">
    <div class="grid grid-cols-8 mr-8 ml-8 mt-10 h-auto bg-slate-200">

        <div class="flex col-span-2 bg-slate-200">
            <div class="bg-transparent rounded-2xl my-2 ml-4 mr-4">  <!-- flex items-center -->
                <a href="#"><img class="rounded-tl-2xl rounded-r-full" repeat="no repeat" src="{{url('img/Isabel.jpg') }}"></a>
            </div>
        </div>

        <div class="col-span-2 bg-white my-2 mr-4 text-center text-xs">
                        <div class="mt-10">
                            SORPRENDE TU MESA Y A TUS PERSONAS
                            <hr class="mx-4 h-1 bg-slate-700" >
                            DALE UN TOQUE ESPECIAL <br><br><br>
                        </div>
        </div>

        <div class=" col-span-4 bg-slate-300 border-4 my-2 mr-4 rounded-2xl p-2">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quae inventore expedita ut quas? Eum sapiente facere aliquid tenetur architecto nemo explicabo iure eos at possimus sint, laudantium, veritatis nam nihil?
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            </p>
        </div>

    </div>
    </div>

<!-- SCRIPT MANUAL Y AUTOMATICO -->
<!-- .<script> filnal de página .........public/js/jquery-3.2.1.js.............................................................. -->
<!-- ................................................................................................................... -->
    <div class="container border-2 border-red-700">
    <div class="grid grid-cols-2  mr-8 ml-8 mt-8">
            <!-- ........................................................................................................... -->
        <div class=""><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad a, assumenda, culpa debitis autem magni quibusdam impedit saepe similique rerum animi illum explicabo accusantium possimus. Velit, voluptas voluptatem? Laudantium, placeat.</p></div>
            <!-- ........................................................................................................... -->
        <div class="border-2 border-red-700">
            <div id="slider-1" class="container">
                <div class="bg-cover bg-center  h-auto w-full text-white py-24 px-10 object-fill"
                    style="background-image: url(http://localhost/winelabel/public/img/slider01.jpg)">
                    <div class="md:w-1/2"><p class="font-bold text-sm uppercase">
                                        </p></div>
                </div> <!-- container -->
                <br>
            </div>
            <!-- ........................................................................................................... -->
            <div id="slider-2" class="container border-2 border-red-700">
                <div class="bg-cover bg-center  h-auto w-full text-white py-24 px-10 object-fill"
                    style="background-image: url(http://localhost/winelabel/public/img/slider02.jpg)">
                    <div class="md:w-1/2"><p class="font-bold text-sm uppercase">
                                        </p></div>
                </div> <!-- container -->
                <br>
            </div>
            <!-- ........................................................................................................... -->

            <div  class="flex justify-between w-12 border-2 border-red-700">
                <button id="sButton1" onclick="sliderButton1()"  class="bg-purple-400 rounded-full w-4 pb-2 " ></button>
                <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
            </div>
        </div>
            <!-- ........................................................................................................... -->
    </div>
    </div>

<!-- CONTENIDO EXTRA -->
<!-- ................................................................................................................... -->
<!-- ................................................................................................................... -->
    <div class="container border-2 border-red-700">
    <div class="hr-gradient
                grid grid-cols-1 
                h-auto
                mr-8 ml-8 mt-8
                ">
 
        <p class="text-3xl text-left mt-4 mr-10 ml-10 ">
                  ¿Qué es la medicina tradicional china (MTC)?</p>
        <p class="text-sm   text-left mr-10 ml-10 ">
                  La medicina china es un estilo tradicional de tratamiento y medicina que se basa en más de 2.000 años de experiencia y práctica médica china. Durante miles de años, la medicina tradicional china (MTC) ha evolucionado y ahora se utiliza cada vez más como un enfoque de salud complementario o forma de tratamiento, tanto en Europa como en los Estados Unidos. Mientras que la medicina occidental se centra tradicionalmente en el tratamiento de enfermedades y patologías, la MTC tiene un enfoque más holístico y trata el ser en su totalidad en lugar de una condición individual per se.</p><br>
        
        <p class="text-3xl text-left mt-4 mr-10 ml-10 ">
                  ¿Por qué se hace?</p>
        <p class="text-sm   text-left mr-10 ml-10">
                  La MTC ve el cuerpo humano como una versión del universo más grande del cual es parte. Uno de los principios básicos de la MTC es el'qi' (o ch'i) del cuerpo, la energía vital, que fluye y circula a través de diferentes canales en el cuerpo llamados meridianos. Estos están conectados a diferentes órganos y a las funciones desempeñadas en el cuerpo. También se basa en conceptos como el yin y el yang, o la armonía entre dos fuerzas opuestas, y la creencia de que la enfermedad resulta de un desequilibrio entre el yin y el yang. La MTC también considera los cinco elementos (fuego, tierra, metal, madera y agua) y el papel que juegan en explicar cómo funciona el cuerpo.
                  Se considera que la MTC es una forma de medicina alternativa o medicina complementaria, ya que no hay suficientes estudios científicos o evidencias para mostrar resultados.</p><br>
        
        <p class="text-3xl text-left mt-4 mr-10 ml-10 ">
                 ¿En qué consiste?</p>
        <p class="text-sm   text-left mr-10 ml-10 ">
                  La MTC cubre una amplia gama de prácticas que han sido una parte básica de la metodología durante miles de años. La MTC incorpora hierbas medicinales y remedios herbales, acupuntura, ventosas, masajes, ejercicio y terapia dietética. El tratamiento se determina en base al "patrón de desarmonía" (es decir, la enfermedad) percibida en el cuerpo.</p><br>

    </div>
    </div>     





<!-- FOOTER -->
<!-- ....resources/css/app.css .............................................................................................. -->
<!-- ........................................................................................................................ -->

<footer id="footer" class=" ">
    <div class="container">
    <div class="grid sm:grid-cols-1 lg:grid-cols-4 mt-10 h-full  bg-black text-white mr-8 ml-8 overflow-hidden ">
    <!-- .................................................................................................................................. -->
    <!--#-->
        <div class="footer-box">
            <h5 class="footer-header">MENU</h5>
            <ul class="footer-menu">
                <li><a href="#">INICIO</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">FORMACION</a></li>
                <li><a href="#">CONTACTO</a></li>
            </ul>
        </div>
    <!-- .................................................................................................................................. -->
    <!--#-->
        <div id="location" class="footer-box"> <!-- font-mont"> -->
            <h5 class="footer-header">DONDE ESTAMOS</h5>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.6397231988476!2d2.172167115264636!3d41.40362987926273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2dcd83dfb93%3A0x9bd8aac21bc3c950!2sBas%C3%ADlica%20de%20la%20Sagrada%20Fam%C3%ADlia!5e0!3m2!1ses!2ses!4v1644219636401!5m2!1ses!2ses"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        class="w-full h-60 mt-3 border-4 border-gray-400 rounded-md shadow-md"
                        ></iframe>
        </div>
    <!-- .................................................................................................................................. -->
    <!--#-->
        <div id="INFO" class="footer-box">
                <h5 class="footer-header">DESAROLLADO CON</h5>
                <p class="mb-5 text-center ">
                    <img class="block mx-auto" repeat="no repeat" src="{{url('img/html5-badge-h-css3-graphics-multimedia-performance-semantics.png') }}">
                </p>
    <!--#-->
                <h5 class="footer-header">OPTIMIZADO PARA</h5>
                <div class="browsers flex flex-row space-x-5 ml-12 mb-8">
                    <a href="#"><img repeat="no repeat" src="{{url('img/chrome.png') }}"></a>
                    <a href="#"><img repeat="no repeat" src="{{url('img/Opera_256x256.png') }}"></a>
                    <a href="#"><img repeat="no repeat" src="{{url('img/safari.png') }}"></a>
                    <a href="#"><img repeat="no repeat" src="{{url('img/firefox-icon.png') }}"><a>
                </div>
        </div>
    <!-- .................................................................................................................................. -->
        <div class="footer-box ">
                <h5 class="footer-header">AUTOR</h5>
                <div class="flex flex-col">
                    <img class="float-right  ml-20  mt-4 w-1/2" repeat="no repeat" src="{{url('img/avatar.jpg') }}" >
                    <p class="text-xs ml-20">&copy; CSG</p>
                </div>
        </div>
    <!-- .................................................................................................................................. -->
    </div>
    </div>
</footer>


   
</x-app-layout>

<!-- *************************************************************************************************************************** -->
    <script src="{{asset('js/slider.js')}}"></script>
<!-- *************************************************************************************************************************** -->


<!-- Slider manual y automático -->
<!-- *************************************************************************************************************************** -->
<script>
var cont=0;
function loopSlider()
    {
    var xx= setInterval(function()
        {
            switch(cont)
            {
                case 0:{
                    $("#slider-1").fadeOut(400);
                    $("#slider-2").delay(400).fadeIn(400);
                    $("#sButton1").removeClass("bg-purple-800");
                    $("#sButton2").addClass("bg-purple-800");
                cont=1;
                break;
                }
                case 1:{
                    $("#slider-2").fadeOut(400);
                    $("#slider-1").delay(400).fadeIn(400);
                    $("#sButton2").removeClass("bg-purple-800");
                    $("#sButton1").addClass("bg-purple-800");
                cont=0;
                break;}
            }
        }
        ,8000);
    }

function reinitLoop(time)
    {
        clearInterval(xx);
        setTimeout(loopSlider(),time);
    }

function sliderButton1(){

    $("#slider-2").fadeOut(400);
    $("#slider-1").delay(400).fadeIn(400);
    $("#sButton2").removeClass("bg-purple-800");
    $("#sButton1").addClass("bg-purple-800");
    reinitLoop(4000);
    cont=0
    }

    function sliderButton2(){
    $("#slider-1").fadeOut(400);
    $("#slider-2").delay(400).fadeIn(400);
    $("#sButton1").removeClass("bg-purple-800");
    $("#sButton2").addClass("bg-purple-800");
    reinitLoop(4000);
    cont=1

    }

    $(window).ready(function(){
        $("#slider-2").hide();
        $("#sButton1").addClass("bg-purple-800");
        loopSlider();
    });
  </script>



</body>
</html>
