<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RolePermissionStoreRequest extends FormRequest
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
            'role_id'       => ['required', 'exists:roles,id'],
            'permissions'   => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'role_id.required'     => 'انتخاب نقش الزامی است.',
            'role_id.exists'       => 'نقش انتخاب‌شده معتبر نیست.',
            'permissions.array'    => 'فرمت مجوزهای انتخاب‌شده معتبر نیست.',
            'permissions.*.exists' => 'یکی از مجوزهای انتخاب‌شده معتبر نیست.',
        ];
    }
}
