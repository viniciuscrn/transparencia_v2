<?php

namespace App\Http\Controllers\licitacao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LicitacaoController extends Controller
{
    public function index()
    {
        return view('admin.licitacao.index');
    }
}
