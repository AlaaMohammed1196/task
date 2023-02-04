<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Course;
use App\Models\SwarFilterPlus;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private  $userService;
    public function __construct(UserService $userService)
    {
        $this->userService=$userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userService->getMany($request);
        if($request->ajax())
            return view('users.partial',compact('users'));
        else
            return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest)
    {
        $userRequest->merge(['password' => Hash::make($userRequest->password)]);
        $this->userService->createOne($userRequest->all());
        return response(['message'=>'Create Successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $userUpdateRequest, User $user)
    {
        $data = $userUpdateRequest->password ? $userUpdateRequest->merge(['password' => Hash::make($userUpdateRequest->password)]) :$userUpdateRequest->except('password');
        $this->userService->updateOne($data,$user);
        return response(['message'=>'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    public function subscribe_course(Request $request,$id)
    {
        $course=Course::findorfail($id);
        $request->merge(['course_id'=>$id]);
        $users = $this->userService->getMany($request);
        $sections=SwarFilterPlus::
        select('id','section')->get()->unique('section');
        if($request->ajax())
            return view('users.user_partial',compact('users','course'));
        else
            return view('users.user_index',compact('course','sections'));
    }




}
