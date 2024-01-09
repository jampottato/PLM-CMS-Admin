<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'userType',
        'name',
        'email',
        'password',
        // Add other attributes that are fillable
    ];

    public $timestamps = false;
}
