<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {   
        $produtos = Produto::all();
        return view('./produtos/produtos',['produtos'=>$produtos]);
    }

    public function cadastro()
    {
        return view('./clientes/cadastro');
    }   

    public function store(Request $request)
    {
        // $Cliente = new Cliente();
        // $Cliente->nome = $request->nome;
        // $Cliente->cpf = $request->cpf;
        // $Cliente->telefone = $request->telefone;
        // $Cliente->idade = $request->idade;
        // $Cliente->profissao = $request->profissao;
        // $Cliente->quantFamiliares = $request->quantFamiliares;
        // $Cliente->rua = $request->rua;
        // $Cliente->bairro = $request->bairro;
        // $Cliente->numero = $request->numero;
        // $Cliente->complemento = $request->complemento;
        // $Cliente->cidade = "Campos dos Goytacazes";
        // $Cliente->cep = $request->cep;

        // $Cliente->save();

        // return redirect('/')->with('msgSucesso','Cliente cadastrado com sucesso!');
    }   

    public function atualizar($codCli)
    {
        // $cliente = Cliente::find($codCli);
        // return view('./clientes/atualizar', ['cliente'=>$cliente]);
    }

    public function update(Request $request, $codCli)
    {
        // $Cliente = Cliente::find($codCli);
        // $Cliente->nome = $request->nome;
        // $Cliente->cpf = $request->cpf;
        // $Cliente->telefone = $request->telefone;
        // $Cliente->idade = $request->idade;
        // $Cliente->profissao = $request->profissao;
        // $Cliente->quantFamiliares = $request->quantFamiliares;
        // $Cliente->rua = $request->rua;
        // $Cliente->bairro = $request->bairro;
        // $Cliente->numero = $request->numero;
        // $Cliente->complemento = $request->complemento;
        // $Cliente->cidade = "Campos dos Goytacazes";
        // $Cliente->cep = $request->cep;

        // $Cliente->save();

        // return redirect('/')->with('msgSucesso','Cliente atualizado com sucesso!');

    }

    public function excluir($codCli)
    {
        return view('./clientes/excluir', ['codCli'=>$codCli]);
    }

    public function destroy($codCli)
    {
        // Cliente::find($codCli)->delete();
        // return redirect('/')->with('msgSucesso','Cliente excluído com sucesso!');
    }
}
