@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Cadastrar nova categoria</h1>
@stop

@section('content')
<div class="content row">
    {{-- <div class="col-md-12 mb-4">
        <a href="{{route('categories.create')}}" class="btn btn-primary">Nova Categoria</a>
    </div> --}}
    <div class="card col-md-12">
        <div class="card-body  col-md-8 ml-auto mr-auto text-secondary">
            <form action="{{route('categories.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título da Categoria</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">URL da Categoria</label>
                    <input type="text" class="form-control" id="url" name="url">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição da Categoria</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>

                <button class="btn btn-primary float-right" type="submit">Salvar</button>
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