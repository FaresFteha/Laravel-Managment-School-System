<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizzesRequest extends FormRequest
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
                        'Name_ar' => 'required',
                        'Name_en' => 'required',
                        
                        'Grade_id' => 'required',
                        'Classroom_id' => 'required',
                        'section_id' => 'required',
                    ];
                }
            case 'PATCH': {
                return [
                    'Name_ar' => 'required',
                    'Name_en' => 'required',
                    'Subject_id' => 'required',
                    'Grade_id' => 'required',
                    'Classroom_id' => 'required',
                    'section_id' => 'required',
                ];
                }
            default:
                break;
        }
    }
}
