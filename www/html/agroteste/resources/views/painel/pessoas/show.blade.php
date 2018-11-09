@extends('painel.templates.template')

@section('content')

    <h1 class="titulo-pg">
        <a href="{{route('pessoas.index')}}"><span class="glyphicon glyphicon-arrow-left"></span></a>
        Pessoa: <b>{{$pessoa->nome}}</b></h1>
    <p><b>Identidade:</b> {{$pessoa->identidade}}</p>
        <p><b>Situação:</b>
            @if($pessoa->active)
            Ativo
            @else
            Inativo
            @endif
        </p>
    <p><b>Cargo:</b> {{$pessoa->cargo}}</p>
    
    <hr>
    @if(isset($errors)&&count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif   
    
    {!! Form::open(['route'=>['pessoas.destroy', $pessoa->id], 'method'=>'DELETE']) !!}
        {!! Form::submit("Deletar pessoa: $pessoa->nome", ['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection