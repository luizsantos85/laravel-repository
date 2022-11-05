@extends('adminlte::page')

@section('title', 'Detalhes do produto')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
    <li class="breadcrumb-item active"><a href="{{route('products.show', $product->id)}}">Detalhes</a></li>
</ol>
@stop

@section('content')


<div class="content row">
    <div class="card col-md-12">
        <div class="card-body  col-md-8 text-secondary">
            <p><strong>ID: </strong> {{$product->id}}</p>
            <p><strong>Títutlo: </strong> {{$product->title}}</p>
            <p><strong>URL: </strong> {{$product->url}}</p>
            <p><strong>Descrição: </strong> {{$product->description}}</p>
        </div>
        <div class="my-2">

            <a href="{{route('products.index')}}" class="btn btn-danger">Voltar</a>
        </div>
    </div>
</div>


@stop