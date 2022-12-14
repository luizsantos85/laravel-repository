<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;
    protected $perPage = 15;

    public function __construct(UserRepositoryInterface $repository)
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
        $users = $this->repository->orderBy('id', 'asc')->paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateUserFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        // $data['password'] = password_hash($request->password,PASSWORD_DEFAULT);
        $data['password'] = bcrypt($request->password);
        $this->repository->store($data);
        return redirect()->route('users.index')->with('success', 'Produto cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->findWhereFirst('id', $id);
        if (!$user) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->findById($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateUserFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        $data = $request->all();
        if(!empty($data['password']))
            $data['password'] = bcrypt($request->password);
        else
            unset($data['password']);

        $user = $this->repository->update($id, $data);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->repository->destroy($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Usuário não encontrado.');
        }
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso.');
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

        $users = $this->repository->search($data, $this->perPage);

        return view('admin.users.index', compact('users', 'data'));
    }
}
