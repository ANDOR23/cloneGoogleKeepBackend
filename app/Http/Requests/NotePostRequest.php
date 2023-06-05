<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotePostRequest extends FormRequest
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
            'title' => 'max:70',
            'content' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El :attribute es obligatorio.',
            'content.required' => 'El :attribute es obligatorio.',
            'title.max' => 'El :attribute es muy largo'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título de la nota',
            'content' => 'contenido ',
        ];
    }
}
