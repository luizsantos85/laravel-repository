@extends('adminlte::page')

@section('title', 'Editar produto')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Produtos</a></li>
    <li class="breadcrumb-item active"><a href="{{route('products.edit', $product->id)}}">Editar</a></li>
</ol>
@stop

@section('content')


<div class="content row">

    @include('includes.alerts.messages')
    <div class="card col-md-12">
        <div class="card-body  col-md-8 ml-auto mr-auto text-secondary">
            {{-- <form action="{{route('products.update', $product->id)}}" method="POST">
                @method('PUT')
                @include('admin.products._partials.form')
            </form> --}}

            {{ Form::model($product, ['route'=> ['products.update',$product->id], 'class' => 'form'])}}
                @method('PUT')
                @include('admin.products._partials.form2')
            {{ Form::close() }}
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