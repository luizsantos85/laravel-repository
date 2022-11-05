@extends('adminlte::page')

@section('title', 'Editar categoria')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
    <li class="breadcrumb-item active"><a href="{{route('categories.edit', $category->id)}}">Editar</a></li>
</ol>
@stop

@section('content')


<div class="content row">

    @include('includes.alerts.messages')
    <div class="card col-md-12">
        <div class="card-body  col-md-8 ml-auto mr-auto text-secondary">
            <form action="{{route('categories.update', $category->id)}}" method="POST">
                @method('PUT')

                @include('admin.categories._partials.form')

            </form>
        </div>
    </div>
</div>


@stop

{{-- CSS dinâmico --}}
@section('css')
{{--
<link href="summernote-bs5.css" rel="stylesheet"> --}}
@stop

{{-- js dinamico --}}
@section('js')
{{-- <script src="summernote-bs5.js"></script> --}}

@stop