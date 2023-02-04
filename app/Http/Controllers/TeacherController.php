<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Services\TeacherService;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    private  $teacherService;
    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService=$teacherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teachers = $this->teacherService->getMany($request);
        if($request->ajax())
          return view('Teacher.partial',compact('teachers'));
        else
            return view('Teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $teacherRequest)
    {
        $teacherRequest->merge(['password' => Hash::make($teacherRequest->password)]);
        $this->teacherService->createOne($teacherRequest->all());
        return response(['message'=>'Create Successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('Teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdateRequest $updateRequest, Teacher $teacher)
    {
       $data = $updateRequest->password ? $updateRequest->merge(['password' => Hash::make($updateRequest->password)]) :$updateRequest->except('password');
        $this->teacherService->updateOne($data,$teacher);
        return response(['message'=>'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
    }


}
