<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'username'   => 'required',
            'password'   => 'required',
            'work_at'    => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'لطفا نام را وارد نمایید.',
            'last_name.required'  => 'لطفا نام خانوادگی را وارد نمایید.',
            'username.required'   => 'لطفا نام کاربری را وارد نمایید.',
            'password.required'   => 'لطفا کلمه عبور را وارد نمایید.',
            'work_at.required'    => 'لطفا محل کار را وارد نمایید.'
        ];
    }
}
