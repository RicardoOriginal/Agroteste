<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Pessoa;
use App\Http\Requests\Painel\PessoasFormRequest;

class PessoaController extends Controller{
    
    private $pessoa;
    private $totalpaginas = 3;


    public function __construct(Pessoa $pessoa) {
        $this->pessoa = $pessoa;
    }

    public function index(){
        
        $titulo = 'Listagem de pessoas';
        
        $pessoas = $this->pessoa->paginate($this->totalpaginas);
        return view('painel.pessoas.index', compact('pessoas', 'titulo'));
    }

    public function create(){
        
        $titulo = 'Cadastrar nova pessoa';
        
        $cargos = ['analista', 'engenheiro agronomo'];
        
        return view('painel.pessoas.create-edit', compact('titulo', 'cargos'));
    }
   
    public function store(PessoasFormRequest $request){
        
        //dd($request->all()); recuperar tudo
        //dd($request->only(['nome', 'identidade'])); recuperar somente os que desejar
        //dd($request->except(['_token', 'cargo'])); buscar acesso o setado
        //dd($request->input('nome')); buscar os input
        
        //trata o erro caso usuário nao marcar checkbox
//        $dadosFormulario = $request->all();
//        
//        if($dadosFormulario['active']=='')
//            $dadosFormulario['active']==0;
//        else 
//            $dadosFormulario['active']==0;
        //busca os dados
        $dadosFormulario = $request->all();
        
        //trata erro do active
        $dadosFormulario['active']=(!isset($dadosFormulario['active']))?0:1;
        
        //tratamento de erros
//        $this->validate($request, $this->pessoa->rules);
        
        //Mensagens de erro
//        $mensagens = [
//            'nome.required' => 'O campo nome é de preenchimento obrigatório!',
//            'nome.min:3' => 'O campo nome é tem que ter mais de 3 letras!',
//            'identidade.numeric' => 'O campo idadentidade precisa ser apenas números!',
//            'identidade.required' => 'O campo identidade é de preenchimento obrigatório!',
//            'cargo.required' => 'O campo cargo é de preenchimento obrigatório',
//        ];
//        //tratamento de erros tambem      
//        $validate=  validator($dadosFormulario, $this->pessoa->rules, $mensagens);
//        if($validate->fails()){
//            return redirect()
//                    ->route('pessoas.create')
//                    ->withErrors($validate)
//                    ->withInput();
//        }
        
        $insert = $this->pessoa->create($dadosFormulario);
        
        if ($insert) {
            return redirect()->route('pessoas.index');
        } else {
            return redirect()->route('pessoas.create');
        }
    }
  
    public function show($id){
        
        $pessoa=  $this->pessoa->find($id);
        
        $titulo= "Pessoa: {$pessoa->nome}";
        
        return view('painel.pessoas.show', compact('pessoa', 'titulo'));
    }
   
    
    public function edit($id){
        //Recuperar a pessoa pelo id
        $pessoa= $this->pessoa->find($id);
        
//        dd($pessoa= $this->pessoa->find($id));
        
        $titulo = "Editar pessoa: {$pessoa->nome}";
        
        $cargos = ['analista', 'engenheiro agronomo'];
        
        return view('painel.pessoas.create-edit', compact('titulo', 'cargos', 'pessoa'));
        
    }

    public function update(PessoasFormRequest $request, $id){
        
        //Recupera todos os dados do formulário
        $dadosFormulario = $request->all();
        
        //Recupera o item para editar
        $pessoa = $this->pessoa->find($id);
        
        //Verificar se a pessoas está ativo
        $dadosFormulario['active']=(!isset($dadosFormulario['active']))?0:1;
        
        //Altera os itens
        $update = $pessoa->update($dadosFormulario);
        
        //Verifica se realmente editou
        if($update)
            return redirect ()->route ('pessoas.index');
        else 
            return redirect ()->route ('pessoas.edit', $id)->with (['errors' => 'Falha ao editar']);
        
    }
    
    public function destroy($id){
        
        $pessoa = $this->pessoa->find($id);
        
        $delete = $pessoa->delete();
        
        if($delete)
            return redirect ()->route ('pessoas.index');
        else
            return redirect ()->route ('pessoas.show',$id)->with (['errors'=>'Falha ao deletar!']);
    }
    
    public function tests(){
//        $pes = $this->pessoa;
//        $pes->nome = 'Juliano';
//        $pes->identidade = 56456;
//        $pes->active = true;
//        $pes->cargo = 'analista';
//        $insert = $pes->save();
//        
//        if($insert)
//            return 'Inserido com sucesso';
//        else
//            return 'Falha ao inserir';

        
//        $insert = $this->pessoa->create([
//            'nome'          => 'Joaquim',
//            'identidade'    => 5465465,
//            'active'        => false,
//            'cargo'         => 'analista',
//        ]);
//        if($insert)
//            return "Inserido com sucesso, ID: {$insert->id}";
//        else
//            return 'Falha ao inserir';
//    }
        
//        $pes = $this->pessoa->find(5);
//        $pes->nome = 'Juliano lima';
//        $pes->identidade = 56456;
//        $pes->active = true;
//        $pes->cargo = 'analista';
//        $update = $pes->save();
//        
//        If($update)
//            return 'Alterado com sucesso!';
//        else
//            return 'Falha ao alterar';
     
//        $pes = $this->pessoa->find(6);
//        $update = $pes->update([
//            'nome'        => 'Teste',
//            'identidade'  => 88888,
//            'active'      => true,
//        ]);
//        
//        if($update)
//            return 'Alterado com sucesso!';
//        else 
//            return 'Falha ao alterar';
        
//        $update = $this->pessoa
//                ->where('identidade', 6565454)
//                ->update([
//                    'nome'        => 'Ricardo foi alterado',
//                    'identidade'  => 88888,
//                    'active'      => true,
//        ]);
//        
//        if($update)
//            return 'Alterado com sucessoaaaaa!';
//        else 
//            return 'Falha ao alterar';
        
//        $pes = $this->pessoa->find(3);
//        $delete = $pes->delete();
//        
//        if($delete)
//            return 'Deletado com sucesso';
//        else
//            return 'Falha ao deletar';  
        
//        $pes = $this->pessoa->destroy(5);
//        
//        if($pes)
//            return 'Deletado com sucesso!';
//        else {
//            return 'Erro ao deletear';
//        }
      
//        $delete = $this->pessoa->where('identidade', 5465465)->delete();
//        
//        if($delete)
//            return 'Deletado com sucesso!';
//        else
//            return 'Erro ao deletear';
        
    }
    
}