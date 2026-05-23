<?php

namespace App\Http\Requests\Permission;

use App\Http\Requests\Role\EditRequest as RoleEditRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Override;

class EditRequest extends RoleEditRequest
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
        return parent::rules();
    }

    public function messages(): array
    {
        return [
            'name.required' => 'لطفا عنوان مجوز را وارد نمایید.',
            'name.string'   => 'عنوان مجوز باید متن باشد.',
            'name.regex'    => 'عنوان مجوز فقط باید شامل حروف انگلیسی باشد و نباید فاصله، عدد یا کاراکتر خاص داشته باشد.',
        ];
    }
}
