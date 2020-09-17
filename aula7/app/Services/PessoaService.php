<?php

namespace App\Services;

use App\Models\Pessoa;

class PessoaService
{
    protected $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    public function index()
    {
        return $this->pessoa->get();
    }

    public function getById($id)
    {
        return $this->pessoa->findOrFail($id);
    }

    public function store($request)
    {
        $pessoa = $this->pessoa->create($request->all());
        return response()->json($pessoa, 201);
    }
}
