@extends('mainTemplate')

@section('content')

<h1 class='title-pg'>Listagem de Filmes</h1>

<a href="{{route('filme.create')}}" class="btn btn-primary"> 
    Cadastrar
</a>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Ano</th>
        <th>Diretor</th>
        <th>Ações</th>
    </tr>
    
        @forelse($filmes as $filme)
            <tr>
                <td>{{$filme->id}}</td>
                <td>{{$filme->titulo}}</td>
                <td>{{$filme->ano}}</td>
                <td>{{$filme->diretor}}</td>
                <td>
                    <a href="{{route('filme.edit', $filme->id)}}" class="action edit">Editar</a>
                    <a href="{{route('filme.show', $filme->id)}}" class="action delete">Ver</a>
                </td>
            </tr>
        @empty
            <p>Sem Dados!</p>
        @endforelse
    
</table>

@endsection