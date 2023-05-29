<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'name_sections' => 'required',
            'name_sections_En' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_sections.required' => trans('validation.required'),
            'name_sections.unique' => trans('validation.unique'),
            'name_sections_En.required' => trans('validation.required'),
            'name_sections_En.unique' => trans('validation.unique'),
        ];
    }
}
