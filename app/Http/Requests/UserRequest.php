<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'email'=>'required|email|unique:users',
            'birth_date' =>'required|date',
            'degree' =>'required|string',
            'phone' =>'required|string',
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
            'name.required' => 'يجب تمرير اسم الطالب ',
            'email.required' => 'يجب تمرير البريد الالكتروني',
            'email.unique' => 'البريد الألكتروني المستخدم تم استخدامه من طرف طالب اخر',
            'birth_date.required' => 'يجب تمرير  تاريخ الميلاد',
            'degree.required' => 'يجب تمرير الدرجه العلميه',
            'password.required' => 'يجب تمرير كلمه المرور',
            'phone.required' => 'يجب تمرير رقم الهاتف ',
        ];
    }
}
