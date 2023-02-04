<?php

namespace App\Services;

use App\Constants\App;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserService
{

    public function getMany(Request $request)
    {
        return User::
              FilterName($request->get('name'))
            ->FilterEmail($request->get('email'))
            ->FilterDegree($request->get('degree'))
            ->FilterBirthDate($request->get('birth_date'))
            ->FilterPhone($request->get('phone'))
            ->FilterCourse($request->get('course_id'))
            ->orderBy('id','desc')
            ->paginate(App::PaginateLength);
    }

    public function createOne($data)
    {
        return User::create($data)->fresh();

    }

    public function updateOne($data, $user)
    {
        return tap($user)->update($data);
    }


}
