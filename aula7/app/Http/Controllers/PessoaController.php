<?php

namespace App\Http\Controllers;

use App\Services\PessoaService;
use Laravel\Lumen\Routing\Controller as BaseController;

class PessoaController extends BaseController
{
    protected $pessoaService;

    public function __construct(PessoaService $pessoaService)
    {
        $this->pessoaService = $pessoaService;
    }

    public function getAll()
    {
        return $this->pessoaService->getAll();
    }
}
