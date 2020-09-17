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
        return $this->pessoaService->index();
    }

    public function show($id)
    {
        return $this->pessoaService->getById($id);
    }

    public function store(Request $request)
    {
        $this->validarPessoa($request);
        return $this->pessoaService->store($request);
    }

    public function update($id, Request $request)
    {
        $this->validarPessoa($request);
        return $this->pessoaService->update($id, $request);
    }

    public function delete($id)
    {
        return $this->pessoaService->delete($id);
    }

    private function validarPessoa(Request $request)
    {
        return $this->validate($request, [
            'nome'      => 'required|string',
            'email'     => 'required|string',
            'senha'     => 'required|string'
        ]);
    }
}
