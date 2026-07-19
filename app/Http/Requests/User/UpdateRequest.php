<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'      => ['required', 'string', 'max:255'],
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'is_active'     => ['required', 'boolean'],
            'departments'   => ['nullable', 'array'],
            'departments.*' => ['integer', 'exists:departments,id'],
            'role'          => ['required', 'exists:roles,name'],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required'      => 'وارد کردن نام کاربری الزامی است.',
            'username.string'        => 'نام کاربری واردشده معتبر نیست.',
            'username.max'           => 'نام کاربری نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'first_name.required'    => 'وارد کردن نام الزامی است.',
            'first_name.string'      => 'نام واردشده معتبر نیست.',
            'first_name.max'         => 'نام نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'last_name.required'     => 'وارد کردن نام خانوادگی الزامی است.',
            'last_name.string'       => 'نام خانوادگی واردشده معتبر نیست.',
            'last_name.max'          => 'نام خانوادگی نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'is_active.required'     => 'انتخاب وضعیت حساب کاربری الزامی است.',
            'is_active.boolean'      => 'وضعیت حساب کاربری معتبر نیست.',
            'departments.array'      => 'لیست دپارتمان‌ها معتبر نیست.',
            'departments.*.integer'  => 'شناسه دپارتمان انتخاب‌شده معتبر نیست.',
            'departments.*.exists'   => 'یکی از دپارتمان‌های انتخاب‌شده در سیستم وجود ندارد.',
            'role.required'          => 'انتخاب نقش کاربری الزامی است.',
            'role.exists'            => 'نقش کاربری انتخاب‌شده معتبر نیست.',
        ];
    }
}
