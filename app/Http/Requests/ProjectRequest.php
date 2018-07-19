<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|max:45',
            'cost' => 'required|numeric',
            'description' =>'required'
        ];
    }
    public function messages(){
        return [
            'cost.numeric' => 'O campo cost deve conter um valor numerico, verifique se não usou virgula ao inves de ponto!'
        ];
    }
}
