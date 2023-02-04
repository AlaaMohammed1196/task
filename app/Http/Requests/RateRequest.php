<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=>'required|numeric',
            'course_id'=>'required|numeric',
            'begin_aiya'=>'required|numeric',
            'end_aiya'=>'required|numeric',
            'wageh'=>'required|numeric',
            'section'=>'required|string',
            'value'=>'required|numeric|min:1|max:10',
        ];
    }
    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ], 422));

    }

    public function messages()
    {
        return [
            'user_id.required' => 'يجب تمرير اسم الطالب ',
            'course_id.required' => 'يجب تمرير رقم الحلقه ',
            'begin_aiya.required' => 'يجب تمرير بدايه الايه ',
            'end_aiya.required' => 'يجب تمرير نهايه الأيه',
            'wageh.required' => 'يجب تمرير عدد الاوجه ',
            'value.required' => 'يجب تمرير التقيم ',
            'section.required' => 'يجب تمرير السوره',
            'value.min' => 'الحد الادني للتقيم 1',
            'value.max' => 'الحد الاعلي للتقيم 10',
        ];
    }
}
