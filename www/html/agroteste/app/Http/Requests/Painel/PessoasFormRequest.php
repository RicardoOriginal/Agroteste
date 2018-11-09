<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class PessoasFormRequest extends FormRequest {

    public function authorize() {
        return true;
    }
    
    public function rules() {
        return [
            'nome' => 'required|min:3|max:150',
            'identidade' => 'required|numeric',
            'cargo' => 'required',
        ];
    }
    
    public function messages(){
        return[
            'nome.required'         => 'O campo nome é de preenchimento obrigatório!',
            'nome.min:3'            => 'O campo nome é tem que ter mais de 3 letras!',
            'identidade.numeric'    => 'O campo idadentidade precisa ser apenas números!',
            'identidade.required'   => 'O campo identidade é de preenchimento obrigatório!',
            'cargo.required'        => 'O campo cargo é de preenchimento obrigatório',
        ];
    }

}
