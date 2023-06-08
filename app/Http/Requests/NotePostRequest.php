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
        #CREACIÓN DEL FORM REQUEST VALIDATION, AL CONFIGURAR ESOS EL ESQUEMA EN LA MIGRACIÓN 
        #COMO NULLABLES, ÚNICAMENTE REQUERIMOS QUE TENGAN UN MÁXIMO DE CARACTERES
        return [
            'title' => 'max:70',
            'content' => 'max:255'
        ];
    }

    public function messages()
    {
        #CREACIÓN DE MENSAJES CUANDO EL REQUEST HA SIDO INVALIDADO
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
