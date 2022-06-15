<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrigen;
use App\Models\Origen;
use Illuminate\Http\Request;

class OrigenController extends Controller
{
/************************************************************************************************************************ */   
public function listado(){
    return view('origenes.listado');    
   }
//Editar   
/************************************************************************************************************************ */
   public function editar(Origen $origen){  
   $origen= Origen::find($origen->id);  
   //return $origen;
   return view('origenes.edit', compact('origen'));
}
/************************************************************************************************************************ */
   public function update(StoreOrigen $request, Origen $origen){
   //return $request;
   //return response()->json($request);   
   $origen->update($request->all());
   return redirect()->route('origenes.listado');
}   
//Crear
/************************************************************************************************************************ */
   public function create(){                               
   //return "Hola que tal";               
   return view('origenes.create');                       
}
/************************************************************************************************************************ */
   public function store(StoreOrigen $request){    
   //return $request; 
   //return response()->json($request);         
   $origen= Origen::create($request->all());                 
   return redirect()->route('origenes.listado');
}
//Eliminar
/************************************************************************************************************************ */
   public function destroy(Origen $origen){
   $origen->delete();   
   return redirect()->route('origenes.listado');
}
/************************************************************************************************************************ */
   public function show(Origen $origen){                    
   //return $origen;                                    
   return view('origenes.show', compact('origen'));       
}
}
