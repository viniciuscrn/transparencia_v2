<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index()
    {
        $instituicao = Instituicao::first();
        return view('admin.instituicao.show',compact('instituicao'));
    }
}
