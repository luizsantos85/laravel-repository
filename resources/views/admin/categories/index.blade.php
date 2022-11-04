@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
<h1>@yield('title')</h1>
@stop



@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('categories.index')}}">Categorias</a></li>
</ol>

<div class="content row">
    <div class="col-md-12 mb-4">
        <a href="{{route('categories.create')}}" class="btn btn-primary">Nova Categoria</a>
    </div>

    <div class="pb-3 col-md-12">
        <div class="col">
            <form class="form-inline" method="post" action="{{route('categorySearch')}}">
                @csrf
                <input type="text" name="title" id="" class="form-control col-md-3" placeholder="Pesquisar título..."
                    {{-- value="{{ $data['title'] ?? '' }}" --}}>
                <input type="text" name="url" id="" class="form-control col-md-3 ml-2" placeholder="Pesquisar url..."
                    {{-- value="{{ $data['url'] ?? '' }}" --}}>
                <button class="btn btn-default ml-2" type="submit">Pesquisar</button>
            </form>

            @if (isset($search))
            <p><strong>Resultados para:</strong> {{$search}}</p>
            @endif
        </div>
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
                        <th scope="col" style="width:200px;">Ações</th>
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

                            <form action="{{route('categories.destroy', $category->id)}}" method="POST"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-outline-danger" type="submit"
                                    onclick="return confirm('Deseja realmente excluir o item?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @if (isset($data))
    {{$categories->appends($data)->links()}}

    @else
    {{$categories->links()}}
    @endif

    {{-- @if ($categories->total() > $categories->perPage())
    <nav>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{$categories->previousPageUrl()}}">
                    << </a>
            </li>
            @for ($i = 1; $i <= $categories->lastPage(); $i++)
                <li class="page-item {{$categories->currentPage() == $i ? 'active' : ''}}">
                    <a class="page-link " href="{{$categories->url($i)}}">{{$i}}</a>
                </li>
                @endfor
                <li class="page-item"><a class="page-link" href="{{$categories->nextPageUrl()}}"> >> </a></li>
        </ul>
    </nav>
    @endif --}}
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