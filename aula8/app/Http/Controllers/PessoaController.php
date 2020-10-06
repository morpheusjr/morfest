<?php

namespace App\Http\Controllers;

use App\Services\PessoaService;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    protected $pessoaService;

    public function __construct(PessoaService $pessoaService)
    {
        $this->pessoaService = $pessoaService;
    }

    public function index()
    {
        $pessoas = $this->pessoaService->index();
        return view('index', ['pessoas' => $pessoas]);
    }

    public function storeForm()
    {
        return view('store');
    }

    public function show($id)
    {
        $pessoa = $this->pessoaService->getById($id);
        return view('show', ['pessoa' => $pessoa]);
    }

    public function store(Request $request)
    {
        $this->pessoaService->store($request);
        return redirect('pessoa');
    }

    public function update($id,  Request $request)
    {
        $this->pessoaService->update($id, $request);
        return redirect('pessoa');
    }

    public function edit($id)
    {
        $pessoa = $this->pessoaService->getById($id);
        return view('edit', ['pessoa' => $pessoa]);
    }

    public function delete($id)
    {
        $this->pessoaService->delete($id);
        return redirect('pessoa');
    }
}
