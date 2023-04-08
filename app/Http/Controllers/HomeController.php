<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (count($instituicao = Instituicao::all()))
            return view('home');

        return view('admin.instituicao.show')->with('message', ['text' => 'Informe os dados cadastrais da instituição.', 'alert' => 'info']);
    }
}
