<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;

Route::get('/', [ClienteController::class,'index']);

Route::get('/cadastro/cliente', [ClienteController::class,'cadastro']);

Route::post('/cadastrar/cliente', [ClienteController::class,'store']);

Route::get('/atualizar/cliente/{codCli}', [ClienteController::class,'atualizar']);

Route::put('/update/cliente/{codCli}', [ClienteController::class,'update']);

Route::get('/excluir/cliente/{codCli}', [ClienteController::class,'excluir']);

Route::delete('/delete/cliente/{codCli}', [ClienteController::class,'destroy']);







