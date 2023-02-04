<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Teacher;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use App\Services\CourseService;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    private  $courseService ,$teacherService;
    public function __construct(CourseService $courseService ,TeacherService $teacherService)
    {
        $this->courseService=$courseService;
        $this->teacherService=$teacherService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = $this->courseService->getMany($request);
        $teachers=$this->teacherService->get();

        if($request->ajax())
            return view('course.partial',compact('courses'));
        else
            return view('course.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers=$this->teacherService->get();;
        return view('course.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $courseRequest)
    {
        $courseRequest->merge(['password' => Hash::make($courseRequest->password)]);
        $this->courseService->createOne($courseRequest->all());
        return response(['message'=>'Create Successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $teachers=$this->teacherService->get();

        return view('course.edit',compact('course','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $courseRequest, Course $course)
    {
        $data = $courseRequest->password ? $courseRequest->merge(['password' => Hash::make($courseRequest->password)]) :$courseRequest->except('password');
        $this->courseService->updateOne($data,$course);
        return response(['message'=>'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
    }




}
