<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoomRequest extends FormRequest
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
                        'Grade_id' => 'required',
                        'Classroom_id' => 'required',
                        'section_id' => 'required',
                        'join_url' => 'required',
                        'topic' => 'required',
                        'start_url' => 'required',
                        'password' => 'required',
                        'duration' => 'required',
                        'start_time' => 'required',
                        'meeting_id' => 'required',
                    ];
                }
            
            default:
                break;
        }
    }
    }

