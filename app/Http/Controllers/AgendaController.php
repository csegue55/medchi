<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use App\Models\User;
use App\Models\Visita;
use Illuminate\Http\Request;


class AgendaController extends Controller
{
/************************************************************************************************************************ */   
public function listado(){

    $visitas= Visita::all();
    return view('agendas.listado', compact('visitas'));    
   }
//Editar   
/************************************************************************************************************************ */
public function editar(Visita $visita){     
    //return $visita;
    return view('agendas.edit', compact('visita'));
 }
 /************************************************************************************************************************ */
    //public function update(StoreUser $request, User $user){
    //return $request;
    //return response()->json($request);   
    //$user->update($request->all());
    //return redirect()->route('users.listado');
 //}   

   
}
