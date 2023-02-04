<?php

namespace App\Services;

use App\Constants\App;
use App\Models\Teacher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeacherService
{

    public function getMany(Request $request)
    {
        return Teacher::
              FilterName($request->get('name'))
            ->FilterEmail($request->get('email'))
            ->FilterDegree($request->get('degree'))
            ->FilterBirthDate($request->get('birth_date'))
            ->orderBy('id','desc')
            ->paginate(App::PaginateLength);
    }
    public function get()
    {
        return Teacher::
            orderBy('id','desc')
            ->get();

    }

    public function createOne($data)
    {
        return Teacher::create($data)->fresh();

    }

    public function updateOne($data, $teacher)
    {
        return tap($teacher)->update($data);
    }


}
