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
        <a href="/tarefas">Task list</a>
    </div>

    <h1>Edit the task: {{ $tarefa->title }} - #{{ $tarefa->id }}</h1>
    <form action="/tarefas/update/{{ $tarefa->id }}" method="post">
        @csrf

        <div>
            <label for="">Title</label>
            <input type="text" name="title" value="{{ $tarefa->title }}" required>
        </div>

        <div>
            <strong>Done?</strong>

            <div>
                <label for="done_true"> Yes
                    <input type="radio" name="done" value="1" id="done_true"
                        {{ $tarefa->done ? 'checked' : '' }}
                        required>
                </label>
            </div>

            <div>
                <label for="done_false"> No
                    <input type="radio" name="done" value="0" id="done_false"
                        {{ $tarefa->done ? '' : 'checked' }}
                        required>
                </label>
            </div>

        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
