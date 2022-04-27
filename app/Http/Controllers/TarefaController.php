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
}
