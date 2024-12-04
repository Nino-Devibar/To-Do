<!-- resources/views/todos/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
</head>
<body>
    <h1>Edit Todo</h1>
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $todo->title }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $todo->description }}</textarea>

        <label for="completed">Completed:</label>
        <input type="checkbox" name="completed" id="completed" {{ $todo->completed ? 'checked' : '' }}>

        <button type="submit">Update Todo</button>
    </form>
</body>
</html>
