@extends('adminlte::page')

@section('title', 'Editar usuário')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuário</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.edit', $user->id)}}">Editar</a></li>
</ol>
@stop

@section('content')


<div class="content row">

    @include('includes.alerts.messages')
    <div class="card col-md-12">
        <div class="card-body  col-md-8 ml-auto mr-auto text-secondary">
            <form action="{{route('users.update', $user->id)}}" method="POST">
                @method('PUT')
                @include('admin.users._partials.form')
            </form>
{{-- 
            {{ Form::model($user, ['route'=> ['users.update',$user->id], 'class' => 'form'])}}
                @method('PUT')
                @include('admin.users._partials.form2')
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