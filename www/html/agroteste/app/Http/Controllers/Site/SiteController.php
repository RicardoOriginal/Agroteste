<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct() {
//        $this->middleware('auth');
//        $this->middleware('auth')
//                ->only([
//                    'contato',
//                    'categoria'
//                ]);
//        $this->middleware('auth')
//                ->except([
//                    'index',
//                    'contato'
//                ]);
    }

    public function index(){
        
        $titulo = 'titulo teste';
        
        $xss = '<script>alert("Ataque XSS");</script>';
        
        $var1 = '123';
        
        $arrayData = [1];
        
        return view('site.home.index', compact('titulo', 'xss', 'var1', 'arrayData'));
    }
    
    public function contato(){
        return view('site.contato.index');
    }
    
    public function categoria(){
        return 'Pg de categoria';
    }
    
    public function cliente($id){
        return "listagem de cliente: {$id}";
    }
    
    public function categoriaOp($id = 10){
        return "listagem de cliente: {$id}";
    }
}
