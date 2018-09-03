@extends('mainTemplate')

@section('content')

<h1 class='title-pg'>Visualiza Endereço</h1>

@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<a href="{{route('endereco.index')}}" class="btn btn-primary">Voltar</a>

<form class="form" method="post" action="{{route('endereco.destroy', $endereco->id)}}">
    {!! method_field('DELETE') !!}

    {!! csrf_field() !!}
    
    <div class="form-group">
        <input type="text" name="pais" placeholder="País:" class="form-control" value="{{$endereco->pais}}">
    </div>
    
    <div class="form-group">
        <input type="text" name="estado" placeholder="Estado:" class="form-control"  value="{{$endereco->estado}}">
    </div>
    
    <div class="form-group">
        <input type="text" name="cidade" placeholder="Cidade:" class="form-control"  value="{{$endereco->cidade}}">
    </div>
    
    <div class="form-group">
        <input type="text" name="complemento" placeholder="Complemento:" class="form-control"  value="{{$endereco->complemento}}">
    </div>
    
    <div class="form-group">
        <input type="number" name="numero" placeholder="Número:" class="form-control"  value="{{$endereco->numero}}">
    </div>
    
    
    <button class="btn btn-danger">Excluir</button>
</form>

</br>

@endsection