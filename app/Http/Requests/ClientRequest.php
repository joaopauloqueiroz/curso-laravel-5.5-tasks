<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Dash;

class ClientRequest extends FormRequest
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
            'name' => ['required', 'max:100', 'min:3', 'dash:par1,par2,par3'],
            'email' => ['required','email','unique:clients'],
            'age' => ['required','integer'],
            'photo' => ['required','mimes:jpg,bmp,png']
        ];
    }

   /*  public function withValidator($validator)
    {
        $validator->after(function($validator){
            if($this->hasDash())
            {
                $validator->errors()->add('name','O campo nome não pode conter caracteres especiais');
            }
        });
    } */

    /**
     * dentro do if acima e chamdo esse metodo para fazer a validação do caractere
     * assim fica melhor de entender quando for ler depois!
     * Da pra sanitizar tbm ver video explicativo sobre sanitiza
     * criar classe de validação para verificação de traços ex
     * @return void
     */
    public function hasDash()
    {
        return strpos($this->name, '-');
    }

   /**
    *metodos especiais, 
    *se mesmo assim eu quiser mudar o texto do erro e so implementar esse metodo
    */
    public function messages(){
         
        return [
            'name.required' => 'O campo nome deve ser preenchido!'
        ];
    }
}
