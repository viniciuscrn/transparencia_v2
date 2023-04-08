<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Validator;

class InstituicaoApiController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cnpj' => 'required',
            'nome' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'logo' => 'required|file|mimes:png,jpeg,jpg'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }

        $instituicao = new Instituicao();
        $instituicao->id = 1;
        $instituicao->cnpj = $request->input('cnpj');
        $instituicao->nome = $request->input('nome');
        $instituicao->endereco = $request->input('endereco');
        $instituicao->bairro = $request->input('bairro');
        $instituicao->cidade = $request->input('cidade');
        $instituicao->uf = $request->input('uf');
        $instituicao->tel = $request->input('tel');
        $instituicao->cel = $request->input('cel');
        $instituicao->email = $request->input('email');
        $instituicao->site = $request->input('site');

        $path = null;

        if (!empty($_FILES['logo']['name'])) {
            $nm = "logo_instituicao";
            $ext = $request->logo->extension();
            $nome = "{$nm}.{$ext}";
            $path = $request->file('logo')->storeAs('images', $nome, 'public');
        }

        $instituicao->logo = $path;
        $instituicao->save();

        return response()->json(['message' => 'Instituição cadastrada com sucesso.'], 200);
    }

    public function show($id)
    {
        $instituicao = Instituicao::find($id);
        if (is_null($instituicao)) {
            return response()->json('Instituição não encontrada', 404);
        }
        return response()->json($instituicao, 200);
    }
}
