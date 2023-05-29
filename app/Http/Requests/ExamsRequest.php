<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamsRequest extends FormRequest
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
                        'day_exam_ar' => 'required',
                        'day_exam_en' => 'required',
                        'term' => 'required',
                        'start_exam' => 'required',
                        'exam_time' => 'required',
                        'exam_duration' => 'required',
                        'Subject_id' => 'required',
                        'academic_year' => 'required',
                        'grade_id' => 'required',
                    ];
                }
            case 'PATCH': {
                    return [
                        'day_exam_ar' => 'required',
                        'day_exam_en' => 'required',
                        'term' => 'required',
                        'start_exam' => 'required',
                        'exam_time' => 'required',
                        'exam_duration' => 'required',
                        'Subject_id' => 'required',
                        'academic_year' => 'required',
                        'grade_id' => 'required',
                    ];
                }
            default:
                break;
        }
    }
}
