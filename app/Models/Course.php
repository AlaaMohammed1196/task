<?php

namespace App\Models;

use App\Scopes\CourseScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected  $fillable=['name', 'teacher_id'];

    protected static function booted()
    {
        static::addGlobalScope(new CourseScope());
    }

    public function scopeFilterName($query ,$name)
    {
        if($name)
            return $query->where('name','LIKE','%'.$name.'%');
    }

    public function scopeFilterTeacher($query ,$teacher)
    {
        if($teacher)
            return $query->where('teacher_id',$teacher);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_courses','course_id','user_id')
            ->withTimestamps();
    }

}
