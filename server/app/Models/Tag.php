<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{ protected $fillable = ['tagName', 'createdBy'];

    protected static function boot()
    {
        parent::boot();

        // Event to update tagCount before creating a new tag
        static::creating(function ($tag) {
            $tag->tagCount = self::calculateTotalTagCount();
        });

        // Event to update tagCount before updating a tag
        static::updating(function ($tag) {
            $tag->tagCount = self::calculateTotalTagCount();
        });
    }

    private static function calculateTotalTagCount()
    {
        return static::count();
    }
    public $timestamps = false;

    
}
