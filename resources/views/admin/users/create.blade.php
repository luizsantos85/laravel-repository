@extends('adminlte::page')

@section('title', 'Cadastrar usuário')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuário</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.create')}}">Adicionar</a></li>
</ol>
@stop

@section('content')


<div class="content row">

    @include('includes.alerts.messages')
    <div class="card col-md-12">
        <div class="card-body  col-md-8 ml-auto mr-auto text-secondary">
            <form action="{{route('users.store')}}" method="POST">
                @include('admin.users._partials.form')
            </form>

            {{-- Formulário dinâmico --}}
            {{-- {{ Form::open(['route'=> 'users.store', 'class' => 'form'])}}
                @include('admin.users._partials.form')
            {{ Form::close() }} --}}
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