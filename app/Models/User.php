<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'phone', 'degree', 'birth_date'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function scopeFilterName($query ,$name)
    {
        if($name)
            return $query->where('name','LIKE','%'.$name.'%');
    }

    public function scopeFilterEmail($query ,$email)
    {
        if($email)
            return $query->where('email',$email);

    }

    public function scopeFilterDegree($query ,$degree)
    {
        if($degree)
            return $query->where('degree','LIKE','%'.$degree.'%');
    }

    public function scopeFilterBirthDate($query ,$date)
    {
        if($date)
            return $query->whereDate('birth_date','>=',$date);
    }
    public function scopeFilterPhone($query ,$phone)
    {
        if($phone)
            return $query->where('phone',$phone);
    }

    public function scopeFilterCourse($query ,$course)
    {
        if($course)
            return $query->whereHas('courses',function ($q)use($course){
               $q->where('courses.id',$course);
            });
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'user_courses','user_id','course_id')
            ->withTimestamps();
    }
    public function rates()
    {
        return $this->hasMany(Rate::class,'user_id');
    }
    public function rate($course)
    {
        return $this->hasOne(Rate::class,'user_id')->where('course_id',$course)->first();
    }
}
