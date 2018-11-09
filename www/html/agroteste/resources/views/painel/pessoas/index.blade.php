@extends('painel.templates.template')

@section('content')
<h1 class="titulo-pg">Listagem de pessoas</h1>

<a href="{{route('pessoas.create')}}" class="btn btn-primary btn-add"> 
    <span class = "glyphicon glyphicon-plus"></span> Cadastrar
</a>

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>Identidade</th>
        <th>Cargo</th>
        <th width='100px'>Ações</th>
    </tr>
    @foreach($pessoas as $pessoa)
    <tr>
        <td>{{$pessoa->nome}}</td>
        <td>{{$pessoa->identidade}}</td>
        <td>{{$pessoa->cargo}}</td>
        <td>
            <a href="{{route('pessoas.edit', $pessoa->id)}}" class='action edit'>
                <span class="glyphicon glyphicon-edit"></span>
            </a>
            <a href="{{route('pessoas.show', $pessoa->id)}}" class="action delete">
                <span class="glyphicon glyphicon-eye-open"></span>
            </a>
        </td>
        
    </tr>
    @endforeach
</table>

{!! $pessoas->links() !!}

@endsection