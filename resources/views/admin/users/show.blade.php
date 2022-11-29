@extends('adminlte::page')

@section('title', 'Detalhes do usuário')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuário</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.show', $user->id)}}">Detalhes</a></li>
</ol>
@stop

@section('content')


<div class="content row">
    <div class="card col-md-12">
        <div class="card-body  col-md-8 text-secondary">
            <p><strong>ID: </strong> {{$user->id}}</p>
            <p><strong>Nome: </strong> {{$user->name}}</p>
            <p><strong>E-mail: </strong> {{$user->email}}</p>

        </div>
        <div class="my-2">
            <a href="{{route('users.index')}}" class="btn btn-warning">Voltar</a>
        </div>
    </div>
</div>


@stop