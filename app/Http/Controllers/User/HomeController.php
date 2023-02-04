<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function subscribe($id){
         auth()->user()->courses()->syncWithoutDetaching([
           'course_id'=>$id
        ]);
    }
}
