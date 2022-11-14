<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryFormRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    protected $perPage = 15;
    protected $repository;

    public function __construct(CategoryRepositoryInterface $repository)
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
        $categories = $this->repository->paginate($this->perPage);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoryFormRequest $request)
    {
        $this->repository->store([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index')->with('success', 'Cadastro realizado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->repository->findById($id);

        if (!$category) {
            return redirect()->back();
        }

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->repository->findWhereFirst('id', $id);
        if (!$category) {
            return redirect()->back();
        }

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateCategoryFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        $this->repository->update($id,[
                'title' => $request->title,
                'url' => $request->url,
                'description' => $request->description
            ]);

        return redirect()->route('categories.index')->with('success', 'Atualização realizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso.');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        // $search = $request->search;
        // $categories = DB::table('categories')
        // ->where('title', 'LIKE', "%{$search}%")
        // ->orWhere('url', 'LIKE', "%{$search}%")
        // ->get();

        $data = $request->except('_token');
        $categories = DB::table('categories')
            ->where(function($query) use ($data){
                if(isset($data['title'])){
                    $query->where('title', 'LIKE', "%{$data['title']}%" );
                }
                if(isset($data['url'])){
                    $query->orWhere('url', 'LIKE', "%{$data['url']}%" );
                }
            })
            ->orderBy('id', 'desc')
            ->paginate($this->perPage);

        return view('admin.categories.index', compact('categories', 'data'));
    }
}
