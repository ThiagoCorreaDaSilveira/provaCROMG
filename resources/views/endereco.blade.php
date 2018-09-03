@extends('mainTemplate')

@section('content')

<h1 class='title-pg'>Listagem de Endereços</h1>

<a href="{{route('endereco.create')}}" class="btn btn-primary"> 
    Cadastrar
</a>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Pais</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>Ações</th>
    </tr>
    
        @forelse($enderecos as $endereco)
            <tr>
                <td>{{$endereco->id}}</td>
                <td>{{$endereco->pais}}</td>
                <td>{{$endereco->estado}}</td>
                <td>{{$endereco->cidade}}</td>
                <td>
                    <a href="{{route('endereco.edit', $endereco->id)}}" class="action edit">Editar</a>
                    <a href="{{route('endereco.show', $endereco->id)}}" class="action delete">Ver</a>
                </td>
            </tr>
        @empty
            <p>Sem Dados!</p>
        @endforelse
    
</table>

@endsection