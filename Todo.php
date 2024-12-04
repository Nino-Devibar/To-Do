<?php

// app/Models/Todo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Define which fields can be mass-assigned
    protected $fillable = [
        'title',        // Allow mass assignment for the 'title' field
        'description',  // Allow mass assignment for the 'description' field (optional)
        'completed',    // Allow mass assignment for the 'completed' field (optional)
    ];
}

