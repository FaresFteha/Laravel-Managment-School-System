<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsAvaregeRequest extends FormRequest
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
                        'Student_id' => 'required',
                        'Subject_id' => 'required',
                        'Grade_id' => 'required',
                        'Classroom_id' => 'required',
                        'Section_id' => 'required',
                        'Section_id' => 'required',
                        'monthlyexam' => 'required',
                        'schoolyearwork' => 'required',
                        'endoftermexam' => 'required',
                        'mark' => 'required',
                        'academic_year' => 'required',
                        'semester' => 'required',
                    ];
                }
            case 'PATCH': {
                    return [
                        'Student_id' => 'required',
                        'Subject_id' => 'required',
                        'Grade_id' => 'required',
                        'Classroom_id' => 'required',
                        'Section_id' => 'required',
                        'monthlyexam' => 'required',
                        'schoolyearwork' => 'required',
                        'endoftermexam' => 'required',
                        'mark' => 'required',
                        'academic_year' => 'required',
                        'semester' => 'required',
                    ];
                }
            default:
                break;
        }
    }
}
