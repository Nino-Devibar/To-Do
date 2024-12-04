<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Show all to-dos
    public function index()
    {
        $todos = Todo::all(); // Get all to-dos from the database
        return view('To-Do.index', compact('todos')); // Pass them to the view
    }

    // Show form to create a new to-do
    public function create()
    {
        return view('To-Do.create'); // Return the view to create a new to-do
    }

    // Store a new to-do
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // Create a new to-do
        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Redirect to the to-do list after storing the new to-do
        return redirect()->route('todos.index');
    }

    // Show form to edit an existing to-do
    public function edit($id)
    {
        $todo = Todo::findOrFail($id); // Find the to-do by ID
        return view('To-Do.edit', compact('todo')); // Pass the to-do to the edit view
    }

    // Update an existing to-do
    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id); // Find the to-do by ID

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // Update the to-do
        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'), // If checked, mark as completed
        ]);

        // Redirect to the to-do list after updating the to-do
        return redirect()->route('todos.index');
    }

    // Delete a to-do
    public function destroy($id)
    {
        Todo::destroy($id); // Delete the to-do by ID
        return redirect()->route('todos.index'); // Redirect to the to-do list after deleting
    }

    // Toggle the completed status of a to-do
    public function toggle(Todo $todo)
    {
        // Toggle the 'completed' status
        $todo->completed = !$todo->completed;
        $todo->save(); // Save the updated status

        // Redirect to the to-do list after toggling
        return redirect()->route('todos.index');
    }
}
