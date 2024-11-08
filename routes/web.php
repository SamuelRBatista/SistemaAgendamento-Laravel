<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\agendaController;
use App\Http\Controllers\agendamentoController;


//Site
Route::get('/', function () {

    return view('home');
  
    });
Route::get('/',[pagesController::class, 'index']);

//Login
Route::get('/admin-login',[usuarioController::class, 'index'])->name('login');;
Route::get('/login',[usuarioController::class, 'show']);
Route::post('/fazer_login',[usuarioController::class,'logar']);
Route::get('/cadastrar_usuario',[usuarioController::class,'registrar']);
Route::post('/registrar_usuario',[usuarioController::class,'inserir']);
Route::get('/logout_usuario',[usuarioController::class, 'Logout']);

//Agendamento
Route::get('/agendamento_index',[agendaController::class,'index'])->name('index');
Route::post('/store',[agendaController::class,'store']);
Route::get('/agenda',[agendaController::class,'show'])->name('agenda.show');
//Route::delete('/delete/agenda/{id}','agendaController@delete');
Route::get('/agenda/{id}',[agendaController::class,'destroy'])->name('agenda.destroy');

//Route::post('/agendamento/store',[agendamentoController::class,'store']);
