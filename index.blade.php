<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>

    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>My To-Do List</h1>
    </header>

    <div class="container">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Add a new task" required>
            <button type="submit">Add Todo</button>
        </form>

        <ul class="todos">
            @foreach($todos as $todo)
                <li class="{{ $todo->completed ? 'completed' : '' }}">
                    <span>{{ $todo->title }}</span> <!-- Display todo title -->
                    
                    <!-- Toggle Complete/Undo button -->
                    <form action="{{ route('todos.toggle', $todo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit">{{ $todo->completed ? 'Undo' : 'Complete' }}</button>
                    </form>

                    <!-- Delete button -->
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
