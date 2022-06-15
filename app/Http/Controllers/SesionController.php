<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSesion;
use App\Models\Sesion;
use Illuminate\Http\Request;

class SesionController extends Controller
{
/************************************************************************************************************************ */   
public function listado(){
    return view('sesiones.listado');    
   }
//Editar   
/************************************************************************************************************************ */
public function editar(Sesion $sesion){  
   $sesion= Sesion::find($sesion->id);  
   //return $sesion;
   return view('sesiones.edit', compact('sesion'));
}
/************************************************************************************************************************ */
public function update(StoreSesion $request, Sesion $sesion){
   //return $request;
   //return response()->json($request);   
   $sesion->update($request->all());
   return redirect()->route('sesiones.listado');
}   
//Crear
/************************************************************************************************************************ */
public function create(){                               
   //return "Hola que tal";               
   return view('sesiones.create');                       
}
/************************************************************************************************************************ */
public function store(StoreSesion $request){    
   //return $request; 
   //return response()->json($request);         
   $sesion= Sesion::create($request->all());                 
   return redirect()->route('sesiones.listado');
}
//Eliminar
/************************************************************************************************************************ */
public function destroy(Sesion $sesion){
   $sesion->delete();   
   return redirect()->route('sesiones.listado');
}
/************************************************************************************************************************ */
public function show(Sesion $sesion){                    
   //return $sesion;                                    
   return view('sesiones.show', compact('sesion'));       
}
/************************************************************************************************************************ */    
}
