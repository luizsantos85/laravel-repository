@if ($errors->any())
<div class="alert alert-danger container col-md-12 rounded">
    <h5><i class="icon fas fa-ban"></i> Ocorreu um Erro!</h5>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
    <div class="col-md-12 rounded bg-success text-white mb-2 p-2">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="col-md-12 rounded bg-danger text-white mb-2 p-2">
        {{session('error')}}
    </div>
@endif