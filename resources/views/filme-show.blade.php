@extends('mainTemplate')

@section('content')

<h1 class='title-pg'>Visualiza Filme</h1>

@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<a href="{{route('filme.index')}}" class="btn btn-primary">Voltar</a>

<form class="form" method="post" action="{{route('filme.destroy', $filme->id)}}">
    {!! method_field('DELETE') !!}

    {!! csrf_field() !!}
    
    <div class="form-group">
        <input type="text" name="titulo" placeholder="Titulo:" class="form-control" value="{{$filme->titulo}}">
    </div>
    
    <div class="form-group">
        <input type="number" name="ano" placeholder="Ano Lançamento:" class="form-control"  value="{{$filme->ano}}">
    </div>
    
    <div class="form-group">
        <input type="text" name="diretor" placeholder="Diretor:" class="form-control"  value="{{$filme->diretor}}">
    </div>
    
    <button class="btn btn-danger">Excluir</button>
</form>

</br>

@endsection