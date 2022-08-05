<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormMedicalAppointmentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:medical_appointment'],
            'description' => ['required'],
            'date_appointment' => ['required'],
        ];
    }

    public function messages()
    {
        $name = [
            'name' => "Nome do paciente",
            'email' => "E-mail",
            "description" => "Descrição da consulta",
            'date_appointment' => "Data da consulta"
        ];

        return [
            "name.required" => "Campo de " . $name['name'] . " é obrigatório.",
            "email.required" => "Campo de " . $name['name'] . " é obrigatório.",
            "description.required" => "Campo de " . $name['name'] . " é obrigatório.",
            "date_appointment.required" => "Campo de " . $name['name'] . " é obrigatório.",
            // "date_appointment.before_or_equal" => "Campo de " . $name['name'] . " deve ser maior que hoje.",
        ];
    }
}
