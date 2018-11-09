@extends('painel.templates.template')

@section('content')

<h1 class="titulo-pg"> 
    <a href="{{route('pessoas.index')}}"><span class="glyphicon glyphicon-arrow-left"></span></a>
    Gestão Pessoa: <b>{{$pessoa->nome or 'novo'}}</b>
</h1>

@if(isset($errors)&&count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if(isset ($pessoa))
    {!! Form::model($pessoa, ['route'=>['pessoas.update', $pessoa->id], 'class'=>'form', 'method'=>'PUT']) !!}
@else
    {!! Form::open(['route'=>'pessoas.store', 'class'=>'form']) !!}
@endif

        <div class="form-group">
            {!! Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Nome:']) !!}
        </div>

        <div class="form-group">
            <label>
                {!! Form::checkbox('active') !!} 
                Ativo?
            </label>
        </div>

        <div class="form-group">
            {!! Form::number('identidade', null, ['class'=>'form-control', 'placeholder'=>'Identidade:']) !!}
        </div>

        <div class="form-group">
            {!! Form::select('cargo', $cargos, null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Enviar', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection

