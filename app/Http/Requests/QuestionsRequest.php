<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
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
                        'title' => 'required',
                        'answers' => 'required',
                        'right_answer' => 'required',
                        'quizze_id' => 'required',
                        'score' => 'required',
                    ];
                }
            case 'PATCH': {
                return [
                    'title' => 'required',
                    'answers' => 'required',
                    'right_answer' => 'required',
                    'quizze_id' => 'required',
                    'score' => 'required',
                ];
                }
                case 'PUT': {
                    return [
                        'title' => 'required',
                        'answers' => 'required',
                        'right_answer' => 'required',
                        'score' => 'required',
                    ];
                    }
            default:
                break;
        }
    }
}
