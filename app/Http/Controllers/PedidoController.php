<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;

class PedidoController extends Controller
{

    public function index()
    {
        $ProdutoController = new ProdutoController();
        $ClienteController = new ClienteController();
        $clientes = $ClienteController->retorna_clientes();

        $pedidos = [];

        foreach($clientes as $cliente)
        {

            $pedidos_cliente = DB::table('cliente_produto')
                ->where('codCli', $cliente->codCli)
                ->get();

            foreach( $pedidos_cliente as $pedido_cliente )
            {
                $produto = $ProdutoController->retorna_produto($pedido_cliente->codProd);

                $pedido = [
                    'cliente'=>$cliente->nome,
                    'produto'=>$produto->nome,
                    'marca'=>$produto->marca,
                    'quantidade'=>$pedido_cliente->quantidade,
                    'data'=>$pedido_cliente->data,
                    'hora'=>$pedido_cliente->hora,
                ];

                array_push($pedidos,$pedido);
            }
        }

        return view('./pedidos/pedidos',['pedidos'=>$pedidos]);

    }
    
    public function carrinho($codCli)
    {
        $carrinho = null;
        if(session()->get('carrinho')!=null)
        {
            $carrinho = session()->get('carrinho');
        }

        $ProdutoController = new ProdutoController();
        $produtos = $ProdutoController->retorna_produtos();

        return view('./pedidos/carrinho',['codCli'=>$codCli,'produtos'=>$produtos,'carrinho'=>$carrinho]);

    }


    public function adicionar_produto(Request $request,$codCli)
    {

        $pedido = $request->toArray();

        date_default_timezone_set('America/Sao_Paulo');
        $time = date('H:i:s');
        $date = date('Y-m-d');

        $ProdutoController = new ProdutoController();
        $produto = $ProdutoController->retorna_produto($pedido['codProd']);

        $subTotal = $produto->preco * floatval($pedido['quantidade']);

        session()->put('carrinho.time',$time);
        session()->put('carrinho.date',$date);

        $dados_pedido = [
            'codProd'=>$produto->codProd,'nome'=>$produto->nome,'marca'=>$produto->marca,
            'preco'=>$produto->preco,'quantidade'=>$pedido['quantidade'],
            'subTotal'=>number_format($subTotal,2,',','.')
        ];

        session()->push('carrinho.produtos',$dados_pedido);

        return redirect('/carrinho/'.$codCli)->with('msgSucesso','Produto adicionado com sucesso!');

    }

    public function remover_produto($codCli,$codProd)
    {

        $produtos = session()->get('carrinho.produtos');

        session()->put('carrinho.produtos',[]);

        foreach( $produtos as $prod )
        {
            if( $prod['codProd'] != $codProd )
            {
                session()->push('carrinho.produtos',$prod);
            }
        }

        return redirect('/carrinho/'.$codCli)->with('msgSucesso','Produto retirado com sucesso!');

    }

    public function finalizar_pedido($codCli)
    {

        // var_dump( session()->get('carrinho') );echo"<br><br>";
        // var_dump( session()->get('carrinho.time') );echo"<br><br>";
        // var_dump( session()->get('carrinho.date') );echo"<br><br>";
        // var_dump( session()->get('carrinho.produtos') );echo"<br><br>";

       foreach( session()->get('carrinho.produtos') as $prod )
       {
            DB::table('cliente_produto')->insert([
                'codCli' => $codCli,
                'codProd' => $prod['codProd'],
                'data'=>session()->get('carrinho.date'),
                'hora'=>session()->get('carrinho.time'),
                'quantidade'=>$prod['quantidade']
            ]);
       }

        return redirect('/')->with('msgSucesso','Pedido cadastrado com sucesso!');

    }


    public function gerar_pedidos()
    {
        $ClienteController = new ClienteController();
        $clientes = $ClienteController->retorna_clientes();

        $ProdutoController = new ProdutoController();
        $produtos = $ProdutoController->retorna_produtos();

        foreach($clientes as $cliente)
        {
            foreach( $produtos as $produto )
            {
                date_default_timezone_set('America/Sao_Paulo');

                $time = rand(8,17).':'.rand(1,59).':'.rand(1,59);
                $hora = date($time);
                $date = '2024-'.rand(1,10).'-'.rand(1,27);
                $quantidade = rand(1,12);

                DB::table('cliente_produto')->insert([
                    'codCli' => $cliente->codCli,
                    'codProd' => $produto->codProd,
                    'data'=>$date,
                    'hora'=>$hora,
                    'quantidade'=>$quantidade
                ]);
            }
        }

        return redirect('/')->with('msgSucesso','Pedidos gerados com sucesso!');

    }

}