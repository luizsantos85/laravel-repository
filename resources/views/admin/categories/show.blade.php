@extends('adminlte::page')

@section('title', 'Detalhes da categoria')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
    <li class="breadcrumb-item active"><a href="{{route('categories.show', $category->id)}}">Detalhes</a></li>
</ol>
@stop

@section('content')


<div class="content row">
    <div class="card col-md-12">
        <div class="card-body  col-md-8 text-secondary">
            <p><strong>ID: </strong> {{$category->id}}</p>
            <p><strong>Títutlo: </strong> {{$category->title}}</p>
            <p><strong>URL: </strong> {{$category->url}}</p>
            <p><strong>Descrição: </strong> {{$category->description}}</p>
        </div>
        <div class="my-2">

            <a href="{{route('categories.index')}}" class="btn btn-danger">Voltar</a>
        </div>
    </div>
</div>


@stop