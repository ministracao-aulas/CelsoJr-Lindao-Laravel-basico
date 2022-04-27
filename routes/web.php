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

Route::get('/tarefas/create', function () {
    return view('tarefas.create');
});

Route::post('/tarefas/store', function (Request $request) {
    $tarefa = Tarefa::create([
        'done' => $request->input('done'),
        'title' => $request->input('title'),
    ]);

    if (!$tarefa) {
        return redirect('tarefas')
            ->with('error', 'Falha ao criar tarefa');
    }

    return redirect('tarefas')
        ->with('success', "Tarefa " . $tarefa->id ." criada com successo");
});

Route::get('/tarefas/edit/{tarefa}', function ($tarefaId) {
    $tarefa = Tarefa::where('id', $tarefaId)->first();

    if (!$tarefa) {
        return redirect('tarefas')->with('error', 'Tarefa não encontrada');
    }

    return view('tarefas.edit', [
        'tarefa' => $tarefa,
    ]);
});

Route::post('/tarefas/update/{tarefa}', function (Request $request, $tarefaId) {
    $tarefa = Tarefa::where('id', $tarefaId)->first();

    if (!$tarefa) {
        return redirect('tarefas')
            ->with('error', 'Tarefa não encontrada');
    }

    $tarefa->update([
        'done' => $request->input('done'),
        'title' => $request->input('title'),
    ]);

    return redirect('tarefas')
        ->with('success', "Tarefa " . $tarefaId ." atualizada");
});

Route::get('/tarefas/done/{tarefa}', function ($tarefaId) {
    $tarefa = Tarefa::where('id', $tarefaId)->first();

    if (!$tarefa) {
        return redirect('tarefas')
            ->with('error', 'Tarefa não encontrada');
    }

    $tarefa->update(['done' => true]);

    return redirect('tarefas')
        ->with('success', "Tarefa " . $tarefaId ." marcada como concluída");
});

Route::get('/tarefas/undone/{tarefa}', function ($tarefaId) {
    $tarefa = Tarefa::where('id', $tarefaId)->first();

    if (!$tarefa) {
        return redirect('tarefas')
            ->with('error', 'Tarefa não encontrada');
    }

    $tarefa->update(['done' => false]);

    return redirect('tarefas')
        ->with('success', "Tarefa " . $tarefaId ." marcada como não concluída");
});

Route::get('/tarefas/delete/{tarefa}', function ($tarefaId) {
    $tarefa = Tarefa::where('id', $tarefaId)->first();

    if (!$tarefa) {
        return redirect('tarefas')
            ->with('error', 'Tarefa não encontrada');
    }

    $tarefa->delete();

    return redirect('tarefas')
        ->with('success', "Tarefa " . $tarefaId ." excluída");
});
