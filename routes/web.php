<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tarefa;
use App\Http\Controllers\TarefaController;

Route::get('/', function () {
    return view('ola');
});

Route::get('/ola-mundo', function () {
    return view('abc123');
});

Route::get('/tarefas', [TarefaController::class, 'index']);

Route::get('/tarefas/create', [TarefaController::class, 'create']);

Route::post('/tarefas/store', [TarefaController::class, 'store']);

Route::get('/tarefas/edit/{tarefa}', [TarefaController::class, 'edit']);

Route::post('/tarefas/update/{tarefa}', [TarefaController::class, 'update']);

Route::get('/tarefas/done/{tarefa}', [TarefaController::class, 'done']);

Route::get('/tarefas/undone/{tarefa}', [TarefaController::class, 'undone']);

Route::get('/tarefas/delete/{tarefa}', [TarefaController::class, 'delete']);
