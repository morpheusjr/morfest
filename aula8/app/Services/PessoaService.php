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

    public function update($id, $request)
    {
        $pessoa = $this->getById($id);
        $pessoa->update($request->all());

        return response()->json($pessoa, 200);
    }

    public function delete($id)
    {
        $pessoa = $this->getById($id);
        $pessoa->delete();

        return response()->json($pessoa, 200);
    }
}
