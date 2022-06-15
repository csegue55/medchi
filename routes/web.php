<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\OrigenController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitaController;
use App\Http\Livewire\AgendaListado;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');})->name('inicio.welcome');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');});
//Route::get('/dashboard', function () {return view('welcome');})->name('welcome');});


//Visitas
//************************************************************************************************** */
Route::get('/visitas/listado',                  [VisitaController::class,'listado'])->name('visitas.listado');     //Listado
Route::get('/visitas/create',                   [VisitaController::class,'create'])->name('visitas.create');       //create   - Form
Route::post('/visitas',                         [VisitaController::class, 'store'])->name('visitas.store');        //create - A.Masiva
Route::get('/visitas/create2',                  [VisitaController::class,'create2'])->name('visitas.create2');     //create   - Form  Prueba
Route::get('/visitas/{visita}/editar',          [VisitaController::class, 'editar']) ->name('visitas.editar');     //edit   - Form
Route::put('/visitas/{visita}',                 [VisitaController::class, 'update']) ->name('visitas.update');     //edit   - A.Masiva
Route::get('/visitas/{visita}',                 [VisitaController::class, 'factura'])->name('visitas.factura');    //factura 


//Users
//************************************************************************************************** */
Route::get('/users/listado',       [UserController::class, 'listado'])->name('users.listado');
Route::get('/users/{user}/editar', [UserController::class, 'editar']) ->name('users.editar');     //edit   - Form
Route::put('users/{user}',         [UserController::class, 'update']) ->name('users.update');     //edit   - A.Masiva
Route::get('/users/create',        [UserController::class, 'create']) ->name('users.create');     //create - Form
Route::post('/users',              [UserController::class, 'store'])  ->name('users.store');      //create - A.Masiva
Route::delete('/users/{user}',     [UserController::class, 'destroy'])->name('users.destroy');    //delete - A.Masiva
Route::get('/users/{user}',        [UserController::class, 'show'])   ->name('users.show');       //delete - Form   
//............................................................................................................

//Tratamientos
//************************************************************************************************** */
Route::get('/tratamientos/listado',       [TratamientoController::class, 'listado'])->name('tratamientos.listado');
Route::get('/tratamientos/{trat}/editar', [TratamientoController::class, 'editar']) ->name('tratamientos.editar');     //edit   - Form
Route::put('tratamientos/{trat}',         [TratamientoController::class, 'update']) ->name('tratamientos.update');     //edit   - A.Masiva
Route::get('/tratamientos/create',        [TratamientoController::class, 'create']) ->name('tratamientos.create');     //create - Form
Route::post('/tratamientos',              [TratamientoController::class, 'store'])  ->name('tratamientos.store');      //create - A.Masiva
Route::delete('/tratamientos/{trat}',     [TratamientoController::class, 'destroy'])->name('tratamientos.destroy');    //delete - A.Masiva
Route::get('/tratamientos/{trat}',        [TratamientoController::class, 'show'])   ->name('tratamientos.show');       //delete - Form   
//............................................................................................................

//Productos
//************************************************************************************************** */
Route::get('/productos/listado',       [ProductoController::class, 'listado'])->name('productos.listado');
Route::get('/productos/{prod}/editar', [ProductoController::class, 'editar']) ->name('productos.editar');     //edit   - Form
Route::put('productos/{prod}',         [ProductoController::class, 'update']) ->name('productos.update');     //edit   - A.Masiva
Route::get('/productos/create',        [ProductoController::class, 'create']) ->name('productos.create');     //create - Form
Route::post('/productos',              [ProductoController::class, 'store'])  ->name('productos.store');      //create - A.Masiva
Route::delete('/productos/{prod}',     [ProductoController::class, 'destroy'])->name('productos.destroy');    //delete - A.Masiva
Route::get('/productos/{prod}',        [ProductoController::class, 'show'])   ->name('productos.show');       //delete - Form   
//............................................................................................................

//origenes
//************************************************************************************************** */
Route::get('/origenes/listado',         [OrigenController::class, 'listado'])->name('origenes.listado');
Route::get('/origenes/{origen}/editar', [OrigenController::class, 'editar']) ->name('origenes.editar');     //edit   - Form
Route::put('origenes/{origen}',         [OrigenController::class, 'update']) ->name('origenes.update');     //edit   - A.Masiva
Route::get('/origenes/create',          [OrigenController::class, 'create']) ->name('origenes.create');     //create - Form
Route::post('/origenes',                [OrigenController::class, 'store'])  ->name('origenes.store');      //create - A.Masiva
Route::delete('/origenes/{origen}',     [OrigenController::class, 'destroy'])->name('origenes.destroy');    //delete - A.Masiva
Route::get('/origenes/{origen}',        [OrigenController::class, 'show'])   ->name('origenes.show');       //delete - Form   
//............................................................................................................

//Sesiones
//************************************************************************************************** */
Route::get('/sesiones/listado',         [SesionController::class, 'listado'])->name('sesiones.listado');
Route::get('/sesiones/{sesion}/editar', [SesionController::class, 'editar']) ->name('sesiones.editar');     //edit   - Form
Route::put('sesiones/{sesion}',         [SesionController::class, 'update']) ->name('sesiones.update');     //edit   - A.Masiva
//Route::put('sesiones/{sesion}', function ($sesion) {return $sesion;})->name('sesiones.update');
Route::get('/sesiones/create',          [SesionController::class, 'create']) ->name('sesiones.create');     //create - Form
Route::post('/sesiones',                [SesionController::class, 'store'])  ->name('sesiones.store');      //create - A.Masiva
Route::delete('/sesiones/{sesion}',     [SesionController::class, 'destroy'])->name('sesiones.destroy');    //delete - A.Masiva
Route::get('/sesiones/{sesion}',        [SesionController::class, 'show'])   ->name('sesiones.show');       //delete - Form   
//............................................................................................................

//Agenda
//************************************************************************************************** */
Route::get('/agendas/listado',         [AgendaController::class, 'listado'])->name('agendas.listado');
Route::get('/agendas/{visita}/editar',   [AgendaController::class, 'editar']) ->name('agendas.editar');     //edit   - Form
Route::put('agendas/{agenda}',         [AgendaController::class, 'update']) ->name('agendas.update');     //edit   - A.Masiva
//............................................................................................................







//components -          href="{{ route('UserEdit.user-edit') }}"
//************************************************************************************************************
//Route::get('/editcomponent',   UserEdit::class)->name('UserEdit.user-edit');
//Route::get('/createcomponent', UserCreate::class)->name('UserCreate.user-create');
//Route::get('/agenda', AgendaListado::class);