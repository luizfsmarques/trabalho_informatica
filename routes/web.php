<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
// use App\Http\Controllers\PedidoController;


// Clientes

Route::get('/', [ClienteController::class,'index']);

Route::get('/cadastro/cliente', [ClienteController::class,'cadastro']);

Route::post('/cadastrar/cliente', [ClienteController::class,'store']);

Route::get('/atualizar/cliente/{codCli}', [ClienteController::class,'atualizar']);

Route::put('/update/cliente/{codCli}', [ClienteController::class,'update']);

Route::get('/excluir/cliente/{codCli}', [ClienteController::class,'excluir']);

Route::delete('/delete/cliente/{codCli}', [ClienteController::class,'destroy']);

// Produtos

Route::get('/produtos', [ProdutoController::class,'index']);

Route::get('/cadastro/produto', [ProdutoController::class,'cadastro']);

Route::post('/cadastrar/produto', [ProdutoController::class,'store']);

Route::get('/atualizar/produto/{codProd}', [ProdutoController::class,'atualizar']);

Route::put('/update/produto/{codProd}', [ProdutoController::class,'update']);

Route::get('/excluir/produto/{codProd}', [ProdutoController::class,'excluir']);

Route::delete('/delete/produto/{codProd}', [ProdutoController::class,'destroy']);

// Pedidos

// PAREI AQUI! - CRUD DOS PEDIDIDOS!

