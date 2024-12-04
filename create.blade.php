<!-- resources/views/todos/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Todo</title>
</head>
<body>
    <h1>Create Todo</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Create Todo</button>
    </form>
</body>
</html>
