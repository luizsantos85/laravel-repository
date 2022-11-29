@csrf
<div class="mb-3">
    <label for="title" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name ?? old('name')}}">
</div>
<div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email ?? old('email') }}">
</div>
<div class="mb-3">
    <label for="password" class="form-label">Senha</label>
    <input type="password" class="form-control" id="password" name="password">
</div>



<button class="btn btn-primary float-right" type="submit">Salvar</button>