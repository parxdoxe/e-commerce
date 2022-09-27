<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Products extends Model
{
    public function getShortDescriptionAttribute()
    {
        return Str::of($this->description)->limit(40);
    }
}
