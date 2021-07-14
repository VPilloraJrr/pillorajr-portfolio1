<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'position_name',
        'description',
        'year_started',
        "year_resigned",
    ];
}
