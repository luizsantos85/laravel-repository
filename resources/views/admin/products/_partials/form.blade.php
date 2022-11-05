@csrf
<div class="mb-3">
    <label for="title" class="form-label">Título da Categoria</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $category->title ?? old('title')}}">
</div>
<div class="mb-3">
    <label for="url" class="form-label">URL da Categoria</label>
    <input type="text" class="form-control" id="url" name="url" value="{{ $category->url?? old('url') }}">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descrição da Categoria</label>
    <textarea class="form-control" id="description" rows="3"
        name="description">{{ $category->description ?? old('description') }}</textarea>
</div>

<button class="btn btn-primary float-right" type="submit">Salvar</button>