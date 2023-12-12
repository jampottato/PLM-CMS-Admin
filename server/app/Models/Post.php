<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'description', // Assuming 'content' is another fillable field
        // Add other fillable fields if necessary
    ];
}
