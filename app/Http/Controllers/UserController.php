<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Illuminate\Support\Str;

class UserController extends Controller
{
/************************************************************************************************************************ */   
   public function listado(){
    return view('users.listado');    
   }
//Editar   
/************************************************************************************************************************ */
   public function editar(User $user){     
   $user= User::find($user->id);  
   //return $user;
   return view('users.edit', compact('user'));
}
/************************************************************************************************************************ */
   public function update(StoreUser $request, User $user){
   //return $request;
   //return response()->json($request);   
   $user->update($request->all());
   return redirect()->route('users.listado');
}   
//Crear
/************************************************************************************************************************ */
   public function create(){                               
   return view('users.create');                       
}
/************************************************************************************************************************ */
   public function store(StoreUser $request){   
      
      $this->validate($request,[
         'email'=>'required|email|unique:users,email',
     ]);

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


   //$user= User::create($request->all());          //Anulo la asignación masiva para poner contraseña encriptada       
   return redirect()->route('users.listado');
}
//Eliminar
/************************************************************************************************************************ */
   public function destroy(User $user){
   $user->delete();   
   return redirect()->route('users.listado');
}
/************************************************************************************************************************ */
   public function show(User $user){                    
   //return $user;                                    
   return view('users.show', compact('user'));       
}
/************************************************************************************************************************ */
}
