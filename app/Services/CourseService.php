<?php

namespace App\Services;

use App\Constants\App;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseService
{

    public function getMany(Request $request)
    {
        return Course::with('teacher')

            ->FilterName($request->get('name'))
            ->FilterTeacher($request->get('teacher_id'))

            ->orderBy('id','desc')
            ->paginate(App::PaginateLength);
    }

    public function createOne($data)
    {
        return Course::create($data)->fresh();

    }

    public function updateOne($data, $course)
    {
        return tap($course)->update($data);
    }


}
