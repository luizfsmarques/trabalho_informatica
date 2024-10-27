<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutoController extends Controller
{
    public function retorna_produtos()
    {   
        return Produto::all();
    }

    public function retorna_produto($codProd)
    {   
        return Produto::find($codProd);
    }
    
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


    public function gerar_produtos()
    {
        $produtos = [
            ['nome'=>'Laranja','marca'=>'bomfruti','categoria'=>'hortifruti','preco'=>5.5],
            ['nome'=>'Limão','marca'=>'bomfruti','categoria'=>'hortifruti','preco'=>3.5],
            ['nome'=>'Alface','marca'=>'bem verde','categoria'=>'hortifruti','preco'=>2.5],
            ['nome'=>'Couve-flor','marca'=>'bomfruti','categoria'=>'hortifruti','preco'=>1.5],
            ['nome'=>'Uva','marca'=>'bomfruti','categoria'=>'hortifruti','preco'=>10.0],
            ['nome'=>'Laranja','marca'=>'bem verde','categoria'=>'hortifruti','preco'=>4.5],
            ['nome'=>'Limão','marca'=>'bem verde','categoria'=>'hortifruti','preco'=>3.5],
            ['nome'=>'Carne chã de dentro','marca'=>'friboi','categoria'=>'carnes','preco'=>40],
            ['nome'=>'Carne de porco','marca'=>'friboi','categoria'=>'carnes','preco'=>15.5],
            ['nome'=>'Frango','marca'=>'friboi','categoria'=>'carnes','preco'=>12],
            ['nome'=>'Frango','marca'=>'boa ave','categoria'=>'carnes','preco'=>15],
            ['nome'=>'Biscoito','marca'=>'bom lanche','categoria'=>'snacks','preco'=>1.25],
            ['nome'=>'Biscoito','marca'=>'negresco','categoria'=>'snacks','preco'=>3.5],
            ['nome'=>'Biscoito','marca'=>'nikito','categoria'=>'snacks','preco'=>1.75],
            ['nome'=>'Bisnaguinha','marca'=>'da casa','categoria'=>'padaria','preco'=>3],
            ['nome'=>'Pão doce','marca'=>'da casa','categoria'=>'padaria','preco'=>2],
            ['nome'=>'Pão de sal','marca'=>'da casa','categoria'=>'padaria','preco'=>2.4],
            ['nome'=>'Detergente','marca'=>'ypê','categoria'=>'limpeza','preco'=>1.5],
            ['nome'=>'Detergente','marca'=>'limpol','categoria'=>'limpeza','preco'=>1.25],
            ['nome'=>'Detergente','marca'=>'minuano','categoria'=>'limpeza','preco'=>1.75],
            ['nome'=>'Desifetante','marca'=>'veja','categoria'=>'limpeza','preco'=>5.5],
            ['nome'=>'Desifetante','marca'=>'ypê','categoria'=>'limpeza','preco'=>5.5],
            ['nome'=>'Desifetante','marca'=>'bom cheiro','categoria'=>'limpeza','preco'=>5.5],
            ['nome'=>'Queijo','marca'=>'sadia','categoria'=>'padaria','preco'=>55.5],
            ['nome'=>'Presunto','marca'=>'sadia','categoria'=>'padaria','preco'=>35.5],
            ['nome'=>'Queijo','marca'=>'rezende','categoria'=>'padaria','preco'=>45.85],
            ['nome'=>'Presunto','marca'=>'seara','categoria'=>'padaria','preco'=>45],
            ['nome'=>'Leite','marca'=>'Nestle','categoria'=>'leite','preco'=>5.5],
            ['nome'=>'Leite','marca'=>'Piracanjuba','categoria'=>'leite','preco'=>5.5],
            ['nome'=>'Leite','marca'=>'Mimo','categoria'=>'leite','preco'=>5.5],
            ['nome'=>'Leite','marca'=>'italac','categoria'=>'leite','preco'=>5.5],
            ['nome'=>'Requeijão','marca'=>'itambe','categoria'=>'frios','preco'=>8.5],
            ['nome'=>'Requeijão','marca'=>'danone','categoria'=>'frios','preco'=>7.5],
            ['nome'=>'Requeijão','marca'=>'dicamp','categoria'=>'frios','preco'=>4.5],
            ['nome'=>'Yogurt','marca'=>'danone','categoria'=>'frios','preco'=>11.1],
            ['nome'=>'Yogurt','marca'=>'trevinho','categoria'=>'frios','preco'=>8.5],
            ['nome'=>'Refrigerante','marca'=>'Coca-cola','categoria'=>'bebidas','preco'=>4.5],
            ['nome'=>'Refrigerante','marca'=>'Guarana antartica','categoria'=>'bebidas','preco'=>3.5],
            ['nome'=>'Refrigerante','marca'=>'fanta laranja','categoria'=>'bebidas','preco'=>4.5],
            ['nome'=>'Refrigerante','marca'=>'fanta uva','categoria'=>'bebidas','preco'=>4.5],
            ['nome'=>'Refrigerante','marca'=>'fanta guarana','categoria'=>'bebidas','preco'=>3.5],
            ['nome'=>'Guaravita','marca'=>'guaravita','categoria'=>'bebidas','preco'=>2.5],
            ['nome'=>'Guaraviton','marca'=>'guaraviton','categoria'=>'bebidas','preco'=>3.5],
            ['nome'=>'Refrigerante','marca'=>'cliper','categoria'=>'bebidas','preco'=>2.5],
            ['nome'=>'Suco de laranja','marca'=>'florenca','categoria'=>'bebidas','preco'=>3.5],
            ['nome'=>'Suco de uva','marca'=>'florenca','categoria'=>'bebidas','preco'=>4.5],
            ['nome'=>'Bolo de chocolate','marca'=>'da casa','categoria'=>'padaria','preco'=>14.5],
            ['nome'=>'Bolo amelia','marca'=>'da casa','categoria'=>'padaria','preco'=>13.5],
            ['nome'=>'Fandangos','marca'=>'fandangos','categoria'=>'snacks','preco'=>2.5],
            ['nome'=>'Pipoca doce','marca'=>'pipoka','categoria'=>'snacks','preco'=>3.5],
            ['nome'=>'Achocolatado','marca'=>'toddy','categoria'=>'snacks','preco'=>2.5],
        ];

        foreach($produtos as $i=>$produto)
        {
            $Produto = new Produto();
            $Produto->nome = $produto['nome'];
            $Produto->marca = $produto['marca'];
            $Produto->categoria = $produto['categoria'];
            $Produto->preco = floatval($produto['preco']);

            $Produto->save(); 
        }

        return redirect('/')->with('msgSucesso','Produtos gerados com sucesso!');

    }
}
