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
        return view('./produtos/cadastro');
    }   

    public function store(Request $request)
    {
        $Produto = new Produto();
        $Produto->nome = $request->nome;
        $Produto->marca = $request->marca;
        $Produto->categoria = $request->categoria;
        $Produto->preco = floatval($request->preco);

        $Produto->save();

        return redirect('/produtos')->with('msgSucesso','Produto cadastrado com sucesso!');
    }   

    public function atualizar($codProd)
    {
        $produto = Produto::find($codProd);
        return view('./produtos/atualizar', ['produto'=>$produto]);
    }

    public function update(Request $request, $codProd)
    {
        $Produto = Produto::find($codProd);
        $Produto->nome = $request->nome;
        $Produto->marca = $request->marca;
        $Produto->categoria = $request->categoria;
        $Produto->preco = floatval($request->preco);

        $Produto->save();

        return redirect('/produtos')->with('msgSucesso','Produto atualizado com sucesso!');

    }

    public function excluir($codProd)
    {
        return view('./produtos/excluir', ['codProd'=>$codProd]);
    }

    public function destroy($codProd)
    {
        Produto::find($codProd)->delete();
        return redirect('/produtos')->with('msgSucesso','Produto excluído com sucesso!');
    }
}
