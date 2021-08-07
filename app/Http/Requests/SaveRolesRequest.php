<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // autorizacion para politica de actualizacion
        return true;
        // \Gate::authorize('update', $this->route('role'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = ['display_name' => 'required'];

        if($this->method() === 'POST')
        {
            $rules['name'] = 'required|unique:roles';
        }

        return $rules;
    }

    public function messages()
    {
        return  ['name.required' => 'EL campo role es obligatorio',
                'name.unique' => 'Este role ya ha sido registrado',
                'display_name.required' => 'EL campo nombre es obligatorio'];
    }
}
