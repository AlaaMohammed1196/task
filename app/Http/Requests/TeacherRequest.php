<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TeacherRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|email|unique:teachers',
            'birth_date' =>'required|date',
            'degree' =>'required|string',
            'password'=>'required',
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
            'name.required' => 'يجب تمرير اسم المعلم ',
            'email.required' => 'يجب تمرير البريد الالكتروني',
            'email.unique' => 'البريد الألكتروني المستخدم تم استخدام من طرف معلم اخر',
            'birth_date.required' => 'يجب تمرير  تاريخ الميلاد',
            'degree.required' => 'يجب تمرير الدرجه العلميه',
            'password.required' => 'يجب تمرير كلمه المرور',
        ];
    }
}
