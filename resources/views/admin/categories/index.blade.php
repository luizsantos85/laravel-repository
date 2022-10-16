@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
<h1>@yield('title')</h1>
@stop

@section('content')
<div class="content row">
    <div class="col-md-12 mb-4">
        <a href="{{route('categories.create')}}" class="btn btn-primary">Nova Categoria</a>
    </div>


    @include('includes.alerts.messages')

    <div class="card col-md-12">
        <div class="card-body ">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="width:50px;">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">url</th>
                        <th scope="col" style="width:150px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>
                            <a href="{{route('categories.show', $category->id)}}"
                                class="font-weight-bold text-secondary">
                                {{$category->title}}
                            </a>
                        </td>
                        <td>{{$category->url}}</td>
                        <td>
                            <a href="{{route('categories.edit',$category->id)}}"
                                class="btn btn-sm btn-outline-primary">Editar</a>
                            <a href="" class="btn btn-sm btn-outline-danger">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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