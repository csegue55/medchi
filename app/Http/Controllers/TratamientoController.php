<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTratamiento;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
/************************************************************************************************************************ */   
public function listado(){
    return view('tratamientos.listado');    
   }
//Editar   
/************************************************************************************************************************ */
   public function editar(Tratamiento $trat){  
   $trat= Tratamiento::find($trat->id);  
   //return $trat;
   return view('tratamientos.edit', compact('trat'));
}
/************************************************************************************************************************ */
   public function update(StoreTratamiento $request, Tratamiento $trat){
   //return $request;
   //return response()->json($request);   
   $trat->update($request->all());
   return redirect()->route('tratamientos.listado');
}   
//Crear
/************************************************************************************************************************ */
   public function create(){                               
   //return "Hola que tal";               
   return view('tratamientos.create');                       
}
/************************************************************************************************************************ */
   public function store(StoreTratamiento $request){    
   //return $request; 
   //return response()->json($request);         
   $trat= Tratamiento::create($request->all());                 
   return redirect()->route('tratamientos.listado');
}
//Eliminar
/************************************************************************************************************************ */
   public function destroy(Tratamiento $trat){
   $trat->delete();   
   return redirect()->route('tratamientos.listado');
}
/************************************************************************************************************************ */
   public function show(Tratamiento $trat){                    
   //return $trat;                                    
   return view('tratamientos.show', compact('trat'));       
}
/************************************************************************************************************************ */    //
}
