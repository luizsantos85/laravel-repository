<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $perPage = 15;
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->relationsShips('category')->paginate();
        
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        // cadastrar via relacionamento
        /*       $category = Category::findOrFail($request->category_id);
        if(!$category){
            return redirect()->route('products.index')->with('error', 'Categoria não cadastrada.');
        }
        $product = $category->products()->create($request->all()); */

        //tratar data
        $this->repository->store($request->all());
        return redirect()->route('products.index')->with('success', 'Produto cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->findWhereFirst('id', $id);
        if (!$product) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->findById($id);
        // $product = $this->repository->findWhereFirst('id', $id);

        if (!$product) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        $product = $this->repository->update($id, $request->all());

        if (!$product) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->destroy($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }
        return redirect()->route('products.index')->with('success', 'Produto deletado com sucesso.');
    }

    /**
     * Busca de produtos
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $data = $request->except('_token');

        $products = $this->repository->search($data, $this->perPage);

        return view('admin.products.index', compact('products', 'data'));
    }
}
