@extends('mainTemplate')

@section('content')

<h1 class='title-pg'>Cadastrar Filme</h1>

@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<a href="{{route('filme.index')}}" class="btn btn-primary">Voltar</a>

@if(isset($filme))
    <form class="form" method="post" action="{{route('filme.update', $filme->id)}}">
            {!! method_field('PUT') !!}
@else
    <form class="form" method="post" action="{{route('filme.store')}}">
@endif
    {!! csrf_field() !!}
    
    <div class="form-group">
        <input type="text" name="titulo" placeholder="Titulo:" class="form-control" value="{{$filme->titulo or old('titulo')}}">
    </div>
    
    <div class="form-group">
        <input type="number" name="ano" placeholder="Ano Lançamento:" class="form-control"  value="{{$filme->ano or old('ano')}}">
    </div>
    
    <div class="form-group">
        <input type="text" name="diretor" placeholder="Diretor:" class="form-control"  value="{{$filme->diretor or old('diretor')}}">
    </div>
    
    <button class="btn btn-primary">Salvar</button>
</form>

</br>

@endsection