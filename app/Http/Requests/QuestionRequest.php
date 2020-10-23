<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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

    public function rules()
    {
        return [
            'lesson_id' => 'required',
            'title' => 'required|string|max:255',
            'audio' => 'nullable|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        ];
    }
}
