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
        $this->validate($request, [
            'nome'      => 'required|string',
            'email'     => 'required|string',
            'senha'     => 'required|string'
        ]);

        return $this->pessoaService->store($request);
    }

    public function update($id, $request)
    {
        //$pessoa = $this->pessoaService->getById($id);
        //return $this->pessoaService->update($pessoa, $request);
    }

    public function delete($id)
    {
        //return $this->pessoaService->delete($id);
    }
}
