<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model{
    
    protected $fillable = ['nome', 'identidade', 'active', 'cargo'];
//    protected $guarded = ['admin'];
    
    
    //as regras foram para request/painel/pessoasformrequest
//    public $rules =[
//        'nome'          => 'required|min:3|max:150',
//        'identidade'    => 'required|numeric',
//        'cargo'         => 'required',
//    ];
}
