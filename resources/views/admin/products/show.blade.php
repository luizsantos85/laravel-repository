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
            <p><strong>Categoria: </strong> {{$product->category->title}}</p>
            <p><strong>Nome: </strong> {{$product->name}}</p>
            <p><strong>URL: </strong> {{$product->url}}</p>
            <p><strong>Descrição: </strong> {{$product->description}}</p>
            <p><strong>Preço: </strong> R$ {{number_format($product->price,2,',','.')}}</p>
        </div>
        <div class="my-2">
            <a href="{{route('products.index')}}" class="btn btn-warning">Voltar</a>
        </div>
    </div>
</div>


@stop