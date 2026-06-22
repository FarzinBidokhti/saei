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
            'username'      => ['required', 'string', 'max:255', 'unique:users,username'],
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'is_active'     => ['required', 'boolean'],
            'role'          => ['required', 'string', 'exists:roles,name'],
            'departments'   => ['nullable', 'array'],
            'departments.*' => ['integer', 'exists:departments,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required'     => 'وارد کردن نام کاربری الزامی است.',
            'username.string'       => 'نام کاربری باید به صورت متن باشد.',
            'username.max'          => 'نام کاربری نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            'username.unique'       => 'این نام کاربری قبلا ثبت شده است.',
            'first_name.required'   => 'وارد کردن نام الزامی است.',
            'first_name.string'     => 'نام باید به صورت متن باشد.',
            'first_name.max'        => 'نام نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            'last_name.required'    => 'وارد کردن نام خانوادگی الزامی است.',
            'last_name.string'      => 'نام خانوادگی باید به صورت متن باشد.',
            'last_name.max'         => 'نام خانوادگی نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            'is_active.required'    => 'انتخاب وضعیت حساب کاربری الزامی است.',
            'is_active.boolean'     => 'وضعیت حساب کاربری معتبر نیست.',
            'role.required'         => 'انتخاب نقش کاربر الزامی است.',
            'role.string'           => 'نقش کاربر معتبر نیست.',
            'role.exists'           => 'نقش انتخاب شده معتبر نیست.',
            'departments.array'     => 'فرمت ایستگاه‌های کاری معتبر نیست.',
            'departments.*.integer' => 'شناسه ایستگاه کاری معتبر نیست.',
            'departments.*.exists'  => 'یکی از ایستگاه‌های کاری انتخاب شده معتبر نیست.',
        ];
    }
}
