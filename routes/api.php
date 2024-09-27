<?php

use App\Http\Controllers\CarrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/armazenar/dados', [CarrosController::class, 'store']);

Route::get('/buscar/dados', [CarrosController::class, 'index']);

Route::put('/atualizar/carro', [CarrosController::class, 'update']);

Route::delete('/deletar/{id}/carro', [CarrosController::class, 'delete']);

Route::get('/procurar/{id}/carro', [CarrosController::class, 'findById']);

Route::get('/procurar/placa', [CarrosController::class, 'searchByPlaca']);

Route::get('/procurar/ano', [CarrosController::class, 'searchByAno']);

Route::get('/procurar/tipo', [CarrosController::class, 'searchByTipo']);

Route::get('/procurar/marca', [CarrosController::class, 'searchByMarca']);

Route::get('/procurar/modelo', [CarrosController::class, 'searchByModelo']);

Route::get('/procurar/valor', [CarrosController::class, 'searchByValor']);