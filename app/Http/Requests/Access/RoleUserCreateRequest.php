<?php

namespace App\Http\Requests\Access;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class RoleUserCreateRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'role_id' => ['required', 'exists:roles,name'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'انتخاب کاربر الزامی است.',
            'user_id.exists'   => 'کاربر انتخاب‌ شده معتبر نیست.',
            'role_id.required' => 'انتخاب نقش الزامی است.',
            'role_id.exists'   => 'نقش انتخاب‌شده معتبر نیست.',
        ];
    }
}
