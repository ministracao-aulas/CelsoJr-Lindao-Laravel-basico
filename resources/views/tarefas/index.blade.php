<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div>
        <strong>
            <a href="/tarefas/create">Create a task</a>
        </strong>
    </div>

    <div>
        @if (\Session::has('error'))
        <strong>
            {{ \Session::get('error') }}
        </strong>
        @endif

        @if (\Session::has('success'))
        <strong>
            {{ \Session::get('success') }}
        </strong>
        @endif
    </div>

    <ul>
        @foreach($tarefas as $tarefa)
        <li>
            <a href="/tarefas/delete/{{ $tarefa->id }}">Delete</a>
            <a href="/tarefas/edit/{{ $tarefa->id }}">Edit</a>

            @if($tarefa->done)
            <a href="/tarefas/undone/{{ $tarefa->id }}">Undone</a>
            <del>
                #{{ $tarefa->id }} - {{ $tarefa->title }}
            </del>
            @else
            <a href="/tarefas/done/{{ $tarefa->id }}">Done</a>
            #{{ $tarefa->id }} - {{ $tarefa->title }}
            @endif
        </li>
        @endforeach
    </ul>
</body>
</html>
