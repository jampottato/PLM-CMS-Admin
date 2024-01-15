<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admirations extends Model
{
    protected $fillable = ['office', 'name', 'description', 'createdBy'];

    public $timestamps = false;
}
