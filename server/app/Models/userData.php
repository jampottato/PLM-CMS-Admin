<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = [
        'usertype',
        'name',
        'email',
        'password',
        'createdBy',
        'description',
    ];

    protected $dates = [
        'createdOn',
        'lastUpdate',
    ];
}
