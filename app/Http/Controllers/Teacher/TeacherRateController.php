<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\SwarFilterPlus;
use Illuminate\Http\Request;
use App\Http\Requests\RateRequest;
use App\Models\Rate;
class TeacherRateController extends Controller
{
    public function RateUser(RateRequest $rateRequest)
    {
        Rate::create($rateRequest->all());
    }
    public function begin_aiya(Request $request)
    {
        $sections=SwarFilterPlus::where('section',$request->section)->get();
        return view('users.begin_aiya',compact('sections'));
    }
    public function end_aiya(Request $request)
    {
        $sections=SwarFilterPlus::where('section',$request->section)
            ->where('end_aiya','>',$request->begin_aiya)->get();
        return view('users.end_aiya',compact('sections'));
    }
    public function wageh(Request $request)
    {
        $wageh=SwarFilterPlus::where('section',$request->section)
            ->where('begin_aiya','>=',$request->begin_aiya)
            ->where('end_aiya','<=',$request->end_aiya)
            ->sum('wageh');
        return response(['wageh'=>$wageh]);
    }
}
