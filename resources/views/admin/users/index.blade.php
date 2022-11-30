@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<h1>@yield('title')</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Usuário</a></li>
</ol>
@stop

@section('content')
<div class="content row">
    <div class="col-md-12 mb-4">
        <a href="{{route('users.create')}}" class="btn btn-primary">Novo Usuário</a>
    </div>

    <div class="pb-3 col-md-12">
        <div class="col">
            <form class="form-inline" method="post" action="{{route('userSearch')}}">
                @csrf
                <input type="text" name="name" value="{{$data['name'] ?? ''}}" class="form-control col-md-3"
                    placeholder="Pesquisar nome...">
                <input type="text" name="email" value="{{$data['email'] ?? ''}}" class="form-control col-md-2 ml-1"
                    placeholder="Pesquisar email...">

                <button class="btn btn-default ml-2" type="submit">Pesquisar</button>
            </form>

            @if (isset($search))
            <p><strong>Resultados para:</strong> {{$search}} </p>
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
                        <th scope="col">E-mail</th>
                        <th scope="col" style="width:200px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>
                            <a href="{{route('users.show', $user->id)}}" class="font-weight-bold text-secondary">
                                {{$user->name}}
                            </a>
                        </td>
                        <td>{{$user->email}}</td>

                        <td>
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary" type="submit"
                                    onclick="return confirm('Deseja realmente excluir o item?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="5">Nenhum Usuário encontrado.</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    {{-- @if (isset($data))
    {{$users->appends($data)->links()}}

    @else
    {{$users->links()}}
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