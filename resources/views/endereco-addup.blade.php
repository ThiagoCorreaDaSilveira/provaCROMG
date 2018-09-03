@extends('mainTemplate')

@section('content')

<h1 class='title-pg'>Cadastrar Endereço</h1>

@if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<a href="{{route('endereco.index')}}" class="btn btn-primary">Voltar</a>

@if(isset($endereco))
    <form class="form" method="post" action="{{route('endereco.update', $endereco->id)}}">
            {!! method_field('PUT') !!}
@else
    <form class="form" method="post" action="{{route('endereco.store')}}">
@endif
    {!! csrf_field() !!}
    
    <div class="form-group">
        <input type="text" name="pais" placeholder="País:" class="form-control" value="{{$endereco->pais or old('pais')}}">
    </div>
    
    <div class="form-group">
        <input type="text" name="estado" placeholder="Estado:" class="form-control"  value="{{$endereco->estado or old('estado')}}">
    </div>
    
    <div class="form-group">
        <input type="text" name="cidade" placeholder="Cidade:" class="form-control"  value="{{$endereco->cidade or old('cidade')}}">
    </div>
    
    <div class="form-group">
        <input type="text" name="complemento" placeholder="Complemento:" class="form-control"  value="{{$endereco->complemento or old('complemento')}}">
    </div>
    
    <div class="form-group">
        <input type="number" name="numero" placeholder="Número:" class="form-control"  value="{{$endereco->numero or old('numero')}}">
    </div>
        
    <button class="btn btn-primary">Salvar</button>
</form>

</br>

@endsection