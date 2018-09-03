@extends('mainTemplate')

@section('content')

<h1>teste</h1>

<h2>{{$teste or ''}}</h2>
<h2>{!!teste or ''!!}</h2> <!--executa comando em variavel-->

@if(true)
    <h3>Show</h3>
@else
    <h3>Hide</h3>    
@endif

@unless($var)
@endunless

@foreach(@array as $data)
    <p>trabalhaVIado</p>
@endforeach

@forelse(@array as $data)
    <p>trabalhaVIado</p>
@empty
    <p>DaNadaPraNois</p>
@endforelse

@php

@endphp

@include('path.nome[semBlade]', $var)

@endsection


@push('scripts')

@endpush