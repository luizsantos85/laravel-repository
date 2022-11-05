@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Produtos</a></li>
</ol>
@stop

@section('content')
<div class="content row">
    <div class="col-md-12 mb-4">
        <a href="{{route('products.create')}}" class="btn btn-primary">Novo Produto</a>
    </div>

    <div class="pb-3 col-md-12">
        <div class="col">
            <form class="form-inline" method="post" action="">
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
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Preço</th>
                        <th scope="col" style="width:200px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>
                            <a href="{{route('products.show', $product->id)}}" class="font-weight-bold text-secondary">
                                {{$product->name}}
                            </a>
                        </td>
                        <td>{{$product->category->title}}</td>
                        <td>R$ {{number_format($product->price,2,',','.')}}</td>

                        <td>
                            <a href="{{route('products.edit', $product->id)}}"
                                class="btn btn-sm btn-outline-primary">Editar</a>

                            <form action="{{route('products.destroy', $product->id)}}" method="POST" class="d-inline">
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
    {{$products->appends($data)->links()}}

    @else
    {{$products->links()}}
    @endif
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