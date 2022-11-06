@csrf
<div class="mb-3">
    <label for="title" class="form-label">Nome do Produto</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? old('name')}}">
</div>
<div class="mb-3">
    <label for="url" class="form-label">URL do Produto</label>
    <input type="text" class="form-control" id="url" name="url" value="{{ $product->url?? old('url') }}">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descrição do Produto</label>
    <textarea class="form-control" id="description" rows="3"
        name="description">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="mb-3">
    <label for="description" class="form-label">Preço do Produto</label>
    <input type="text" class="form-control" id="price" name="price" value="{{ $product->price?? old('price') }}">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Categoria do Produto</label>
    <select name="category_id" class="form-control">
        <option value>Selecione a categoria...</option>
        @forelse ($categories as $category)
        <option value="{{$category->id}}" @if (isset($product->category_id) && $category->id === $product->category_id)
            selected @endif>
            {{$category->title}}
        </option>
        @empty
        <option disabled>Nenhuma categoria cadastrada.</option>
        @endforelse
    </select>
</div>


<button class="btn btn-primary float-right" type="submit">Salvar</button>