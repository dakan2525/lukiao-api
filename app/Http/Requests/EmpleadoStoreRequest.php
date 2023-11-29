<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //este if valida que el metodo que viene de la solicitud sea post, si es uno diferente no solicita la cedula
        if (request()->isMethod('post')) {
            //validaciones para cada uno de los campos que espera en el request
            return [
                'nombre' => 'required|string|max:50',
                'apellido' => 'required|string|max:50',
                'razon_social' => 'required|string|max:100',
                'cedula' => 'required|integer|unique:empleados,cedula',
                'telefono' => 'required|integer',
                'pais' => 'required|string|max:50',
                'ciudad' => 'required|string|max:50',
            ];
        } else {
            return [
                'nombre' => 'required|string|max:50',
                'apellido' => 'required|string|max:50',
                'razon_social' => 'required|string|max:100',
                'telefono' => 'required|integer',
                'pais' => 'required|string|max:50',
                'ciudad' => 'required|string|max:50',
            ];
        }
    }

    public function messages(): array
    {

        // respuesta para cada caso que pueda presentarse con las validaciones anteriormente indicadas 
        if (request()->isMethod('post')) {
            return [
                'nombre.required' => 'El nombre es requerido',
                'apellido.required' => 'El apellido es requerido',
                'razon_social.required' => 'La razon social es requerida',
                'cedula.required' => 'La cedula es requerida',
                'cedula.unique' => 'La cedula ya esta registrada',
                'telefono.required' => 'El telefono es requerido',
                'pais.required' => 'El pais es requerido',
                'ciudad.required' => 'La ciudad es requerida',
            ];
        } else {
            return [
                'nombre.required' => 'El nombre es requerido',
                'apellido.required' => 'El apellido es requerido',
                'razon_social.required' => 'La razon social es requerida',
                'telefono.required' => 'El telefono es requerido',
                'pais.required' => 'El pais es requerido',
                'ciudad.required' => 'La ciudad es requerida',
            ];
        }

    }

}