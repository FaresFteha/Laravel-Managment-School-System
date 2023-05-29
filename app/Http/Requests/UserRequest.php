<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name_ar' => 'required|unique:users,name->ar,' . $this->id,
                        'name_en' => 'required|unique:users,name->en,' . $this->id,
                        'email' => 'required|email|unique:users,email,' . $this->id,
                        'password' => 'required|string|min:6|max:10',
                    ];
                }
            case 'PATCH': {
                    return [
                        'name_ar' => 'required',
                        'name_en' => 'required',
                        'email' => 'required|email',
                    ];
                }
            default:
                break;
        }
    }
}
