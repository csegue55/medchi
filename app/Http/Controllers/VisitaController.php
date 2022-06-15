<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisita;
use App\Models\User;
use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VisitaController extends Controller
{

//Listado
/********************************************************************************************************************** */    
public function listado(){

    $visitas= Visita::all();
    $users= User::all();
    return view('visitas.listado', compact('visitas', 'users'));
}
//Crear
/************************************************************************************************************************ */
public function create(){      
    $users= User::orderBy('name','asc')->get();                         
    return view('visitas.create', compact('users'));                       
 }
/************************************************************************************************************************ */
public function store(StoreVisita $request){    

    //return $request;

    /*
    if(($request->name && $request->apellido) <> "")
    {
        User::create([
            'name' => $request->name,
            'apellido' =>$request->apellido,
            'tfno' => $request->tfno,
            'email'=> $request->email,
            'origen_id'=> $request->origen_id,
            'rol'=> $request->rol,
            'cont'=> $request->cont,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10),
            ]);

        $usuId= User::where('email',$request->email)->first();

        $vis= new Visita();
        $vis->fecha= $request->fecha;
        $vis->user_id= $usuId->id;
        $vis->sintomas= $request->sintomas;
        $vis->observaciones= $request->observaciones;
        $vis->save();
    }else{
        $vis= new Visita();
        $vis->fecha= $request->fecha;
        $vis->user_id= $request->id;
        $vis->save();
    }        
        $visId= Visita::find($vis->id);
*/

        $vis= new Visita();
        $vis->fecha= $request->fecha;
        $vis->user_id= $request->id;
        $vis->sintomas= $request->sintomas;
        $vis->observaciones= $request->observaciones;
        $vis->save();

        $visId= Visita::find($vis->id);
        
    if( $request->producto ){
        for($i=0; $i < count($request->producto); $i++){
            $visId->productos()->attach([$request->producto[$i]]);
        }    
    }

    if( $request->tratamiento ){
        for($j=0; $j < count($request->tratamiento); $j++){
            $visId->tratamientos()->attach([$request->tratamiento[$j]]);
        }    
    }

    //$vis= Visita::create($request->all());                 
    return redirect()->route('visitas.listado');
    }

//Editar    
/************************************************************************************************************************ */
public function editar(Visita $visita){     

    //return $visita;
    $visitas_id= Visita::where('id',$visita->id)->get(); 
    $visitas_user_id= Visita::where('user_id', $visita->user_id)->get(); 
    $visitas_all= Visita::all();
    return view('visitas.edit', compact('visitas_id','visitas_user_id','visitas_all'));
}
/************************************************************************************************************************ */
public function update(Request $request, Visita $visita){
    //return $request;
    //return response()->json($request);   

    $visita2= Visita::find($request->id);

    if( $request->pro ){
        $visita2->productos()->detach();
        for($i=0; $i < count($request->pro); $i++){
            $visita2->productos()->attach([$request->pro[$i]]);
        }
    }

    if( $request->trat ){
        $visita2->tratamientos()->detach();
        for($j=0; $j < count($request->trat); $j++){
            $visita2->tratamientos()->attach([$request->trat[$j]]);
        }    
    }

    if($request->observaciones == ""){
        $visita2->observaciones= "Campo vacío";
        $visita2->save();
    }else{
        $visita2->observaciones= $request->observaciones;
        $visita2->save();
    }

    if($request->sintomas == ""){
        $visita2->sintomas= "Campo vacío";
        $visita2->save();
    }else{
        $visita2->sintomas= $request->sintomas;
        $visita2->save();
    }


    //$visita->update($request->all());
    return redirect()->route('visitas.listado');
}  

/************************************************************************************************************************ */
public function factura(Visita $visita){

    //return $visita;
    return view('visitas.factura', compact('visita'));

}


}
