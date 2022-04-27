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

    <h1>Create a task</h1>
    <form action="/tarefas/store" method="post">
        @csrf

        <div>
            <label for="">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <strong>Done?</strong>

            <div>
                <label for="done_true"> Yes
                    <input type="radio" name="done" value="1" id="done_true"
                        {{ old('done') ? 'checked' : '' }}
                        required>
                </label>
            </div>

            <div>
                <label for="done_false"> No
                    <input type="radio" name="done" value="0" id="done_false"
                        {{ old('done') ? '' : 'checked' }}
                        required>
                </label>
            </div>

        </div>

        <div>
            <button type="submit">Create</button>
        </div>
    </form>
</body>
</html>
