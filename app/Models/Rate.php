<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable=['user_id', 'course_id', 'begin_aiya', 'end_aiya', 'wageh', 'user_id', 'course_id', 'value', 'section'];

}

