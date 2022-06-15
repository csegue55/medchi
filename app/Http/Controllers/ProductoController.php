<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProducto;

class ProductoController extends Controller
{
/************************************************************************************************************************ */   
public function listado(){
    return view('productos.listado');    
   }
//Editar   
/************************************************************************************************************************ */
   public function editar(Producto $prod){  
   $prod= Producto::find($prod->id);  
   //return $prod;
   return view('productos.edit', compact('prod'));
}
/************************************************************************************************************************ */
   public function update(StoreProducto $request, Producto $prod){
   //return $request;
   //return response()->json($request);   
   $prod->update($request->all());
   return redirect()->route('productos.listado');
}   
//Crear
/************************************************************************************************************************ */
   public function create(){                               
   //return "Hola que tal";               
   return view('productos.create');                       
}
/************************************************************************************************************************ */
   public function store(StoreProducto $request){    
   //return $request; 
   //return response()->json($request);         
   $prod= Producto::create($request->all());                 
   return redirect()->route('productos.listado');
}
//Eliminar
/************************************************************************************************************************ */
   public function destroy(Producto $prod){
   $prod->delete();   
   return redirect()->route('productos.listado');
}
/************************************************************************************************************************ */
   public function show(Producto $prod){                    
   //return $prod;                                    
   return view('productos.show', compact('prod'));       
}
}
