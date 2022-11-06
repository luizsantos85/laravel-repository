<div class="mb-2">
    {{ Form::text('name',null, ['placeholder'=> 'Nome do produto', 'class' => 'form-control' ])}}
</div>

<div class="mb-2">
    {{ Form::text('url',null, ['placeholder'=> 'URL do Produto', 'class' => 'form-control' ])}}
</div>

<div class="mb-2">
    {{ Form::text('price',null, ['placeholder'=> 'R$ 0,00', 'class' => 'form-control' ])}}
</div>

<div class="mb-2">
    {{ Form::select('category_id', $categories, null,['class' => 'form-control'])}}
</div>

<div class="mb-2">
    {{ Form::textarea('description',null, ['placeholder'=> 'Descrição do Produto', 'class' => 'form-control' ])}}
</div>

<button class="btn btn-primary float-right" type="submit">Salvar</button>