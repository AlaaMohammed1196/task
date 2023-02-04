<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $fillable=['name', 'email', 'password', 'degree', 'birth_date'];


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

}
