<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getShortDescriptionAttribute()
    {
        return Str::of($this->description)->limit(40);
    }

    public function colors() 
    {
        return $this->belongsToMany(Colors::class);
    }

    public function category() 
    {
        return $this->belongsTo(Categories::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    
}
