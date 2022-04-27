<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $dados = Tarefa::limit(10)->get();

        return view('tarefas.index', [
            'tarefas' => $dados,
        ]);
    }
}
