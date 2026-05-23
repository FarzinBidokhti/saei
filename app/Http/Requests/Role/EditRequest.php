<?php

namespace App\Http\Requests\Role;

use Override;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class EditRequest extends FormRequest
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
            'name' => [
                'bail',
                'required',
                'string',
                'regex:/^[A-Za-z]+$/',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'لطفا عنوان نقش را وارد نمایید.',
            'name.string'   => 'عنوان نقش باید متن باشد.',
            'name.regex'    => 'عنوان نقش فقط باید شامل حروف انگلیسی باشد و نباید فاصله، عدد یا کاراکتر خاص داشته باشد.',
        ];
    }
}
