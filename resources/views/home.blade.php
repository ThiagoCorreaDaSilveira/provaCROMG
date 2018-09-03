@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Opções</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <a href="{{route('endereco.index')}}" class="btn btn-primary esq"> 
                            Manipular Endereços
                        </a>

                        <a href="{{route('filme.index')}}" class="btn btn-primary dir"> 
                            Manipular Filmes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
