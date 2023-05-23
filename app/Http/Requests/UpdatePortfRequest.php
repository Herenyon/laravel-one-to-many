<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePortfRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'repo_title' => [
                'required',
                Rule::unique('portfs')->ignore($this->portf),
                'string',
                'max:30',
            ],
            'author' => 'string|max:30',
            'nickname' => 'string|max:50',
            'description' => 'string',
            'image' => 'nullable|image|max:2048',

        ];
    }
}
