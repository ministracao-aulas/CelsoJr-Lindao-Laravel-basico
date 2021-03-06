<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $dados = Tarefa::limit(10)->get();

        // return view('tarefas.index', compact('dados'));//compact
        return view('tarefas.index', [
            'tarefas' => $dados,
        ]);//array
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function delete($tarefaId)
    {
        $tarefa = Tarefa::where('id', $tarefaId)->first();

        if (!$tarefa) {
            return redirect('tarefas')
                ->with('error', 'Tarefa não encontrada');
        }

        $tarefa->delete();

        return redirect('tarefas')
            ->with('success', "Tarefa " . $tarefaId ." excluída");
    }

    public function undone($tarefaId)
    {
        $tarefa = Tarefa::where('id', $tarefaId)->first();

        if (!$tarefa) {
            return redirect('tarefas')
                ->with('error', 'Tarefa não encontrada');
        }

        $tarefa->update(['done' => false]);

        return redirect('tarefas')
            ->with('success', "Tarefa " . $tarefaId ." marcada como não concluída");
    }

    public function done($tarefaId)
    {
        $tarefa = Tarefa::where('id', $tarefaId)->first();

        if (!$tarefa) {
            return redirect('tarefas')
                ->with('error', 'Tarefa não encontrada');
        }

        $tarefa->update(['done' => true]);

        return redirect('tarefas')
            ->with('success', "Tarefa " . $tarefaId ." marcada como concluída");
    }

    public function edit($tarefaId)
    {
        $tarefa = Tarefa::where('id', $tarefaId)->first();

        if (!$tarefa) {
            return redirect('tarefas')->with('error', 'Tarefa não encontrada');
        }

        return view('tarefas.edit', [
            'tarefa' => $tarefa,
        ]);
    }

    public function update(Request $request, $tarefaId)
    {
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
    }

    public function store(Request $request)
    {
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
    }
}
