<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required','min:20'],
            'user_id' => 'required|exists:users,id',
            'time'=> 'required|date_format:Y-m-d H:i'
        ];
    }

    /**
     *  Customise the Error message for rules
     */
    public function messages()
    {
        return ['title.required' => 'Title is required'];
    }
}
