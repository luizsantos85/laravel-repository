@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop



@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
</ol>

<p>Welcome to this beautiful admin panel.</p>

<div id="summernote">Hello Summernote</div>
@stop

{{-- CSS dinâmico --}}
@section('css')
{{-- <link href="summernote-bs5.css" rel="stylesheet"> --}}
@stop

{{-- js dinamico --}}
@section('js')
{{-- <script src="summernote-bs5.js"></script> --}}

@stop