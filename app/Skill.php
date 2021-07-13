<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Skill extends Model
{
    protected $fillable =[
        'skill_name',
        'percent',
        'logo',
    ];
}
