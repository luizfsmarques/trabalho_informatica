<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;

use App\Models\Cliente;

class ClienteController extends Controller
{

    public function retorna_clientes()
    {   
        return Cliente::all();
    }
    
    public function index()
    {   
        session()->put('carrinho', ['time'=>null,'date'=>null,'produtos'=>[]]);

        // $clientes = Cliente::all();
        $clientes = Cliente::paginate(10);

        return view('./clientes/clientes',['clientes'=>$clientes]);

    }

    public function cadastro()
    {
        return view('./clientes/cadastro');
    }   

    public function store(Request $request)
    {
        $Cliente = new Cliente();
        $Cliente->nome = $request->nome;
        $Cliente->cpf = $request->cpf;
        $Cliente->telefone = $request->telefone;
        $Cliente->idade = $request->idade;
        $Cliente->profissao = $request->profissao;
        $Cliente->quantFamiliares = $request->quantFamiliares;
        $Cliente->rua = $request->rua;
        $Cliente->bairro = $request->bairro;
        $Cliente->numero = $request->numero;
        $Cliente->complemento = $request->complemento;
        $Cliente->cidade = "Campos dos Goytacazes";
        $Cliente->cep = $request->cep;

        $Cliente->save();

        return redirect('/')->with('msgSucesso','Cliente cadastrado com sucesso!');
    }   

    public function atualizar($codCli)
    {
        $cliente = Cliente::find($codCli);
        return view('./clientes/atualizar', ['cliente'=>$cliente]);
    }

    public function update(Request $request, $codCli)
    {
        $Cliente = Cliente::find($codCli);
        $Cliente->nome = $request->nome;
        $Cliente->cpf = $request->cpf;
        $Cliente->telefone = $request->telefone;
        $Cliente->idade = $request->idade;
        $Cliente->profissao = $request->profissao;
        $Cliente->quantFamiliares = $request->quantFamiliares;
        $Cliente->rua = $request->rua;
        $Cliente->bairro = $request->bairro;
        $Cliente->numero = $request->numero;
        $Cliente->complemento = $request->complemento;
        $Cliente->cidade = "Campos dos Goytacazes";
        $Cliente->cep = $request->cep;

        $Cliente->save();

        return redirect('/')->with('msgSucesso','Cliente atualizado com sucesso!');

    }

    public function excluir($codCli)
    {
        return view('./clientes/excluir', ['codCli'=>$codCli]);
    }

    public function destroy($codCli)
    {
        Cliente::find($codCli)->delete();
        return redirect('/')->with('msgSucesso','Cliente excluído com sucesso!');
    }

    public function gerar_dados()
    {
        $this->gerar_clientes();

        $ProdutoController = new ProdutoController();
        $ProdutoController->gerar_produtos();

        $PedidoController = new PedidoController();
        $PedidoController->gerar_pedidos();

        return redirect('/')->with('msgSucesso','Clientes gerados com sucesso!');

    }

    public function gerar_clientes()
    {
        $nomes = [
            'Paulo Cesar','Thaís Moreira','Bernado','Luiz Fernando','Jade Rebeca','João Machado','Marcia Gusmão','Marcos Gomes', 'Julia Gomes','Mariana Barbosa',
            'Marcos Cesar','Daniela Moreira','Bernado Barbosa','Luiz Felipe','Jade Juliana','Joaquim Machado','Marcia Valentim','Marcos Lukas', 'Julia Leticia','Mariana Azevedo',
            'Paulo Junior','Thaís Ellen','Beatriz ju','Fernando Londres','Rebeca Hellen','João Bial','Marcia Campbell','Marllon Gomes', 'Julia Azevedo','Mariana Hellen',
            'João Cesar','Talita Moraes','Bernado Lopes','Luiz Silva','Jade Brasil','João Maranhão','Marcia Gabriela','Marlene Gomes', 'Juliana Gomes','junior Barbosa',
            'Jessica Cesar','Thaís Barbosa','Bertran José','Bruno Beto','Jaque Borges','Jonas Machado','Marilia Gusmão','Marcos Silva', 'Jorge Goes','Mariana Gomes',
            'Paulo Lopes','Thaís Silva','José Alves','Luiz Joaquim','Gina Rebeca','Jessica Machado','Jessica Gusmão','Marcia Silva', 'Jaqueline Valetim','Maria Barbara',
            'Paulo Joaquim','Talita Alves','Bernado Alves','Lucas Barbosa','Bruna Rebeca','Joel Machado','Marcio Fonte','Marllon Montes', 'Juba Felson','Mari Moraes',
            'Paula Barbosa','Tatiana Moraes','Bernado Lukas','Luia marcela','Beatriz Fontes','João Maciel','Marcos Montim','Fabio Barbosa', 'Juca Marcos','Mariana Beatriz Azevedo',
            'Paula Marcia','Thassia Silva','Bernado Moises','Marcos Lopes','Lucas Lopes','Joana Machado','Mario Gustavo','Mario Bomes', 'Julia Azevedo','Marcos Barbosa',
            'Paul Jorge','Thaís Moraes','Beatriz Alves','Luiz Serra','Jade Rebeca','Barbara Machado','Marilene Gusmão','Marcos Costa', 'Juliano Gomes','Maria das Graças',
        ];

        foreach($nomes as $i=>$nome)
        {
            $cpf = rand(0,9).''.rand(0,9).''.rand(0,9).'.'.rand(0,9).''.rand(0,9).''.rand(0,9).'.'.rand(0,9).''.rand(0,9).''.rand(0,9).'-'.rand(0,9).''.rand(0,9);
            $telefone = '(22)99876-5432';
            $idade = rand(18,60);
            $profissao = "Profissão ".$i;
            $quantFamiliares = rand(1,10);
            $rua = "Rua ".$i;
            $bairro = "Bairro ".rand(1,12);
            $numero = $i;
            $complemento = "Complemento ".$i;
            $cidade = "Campos dos Goytacazes";
            $cep = "11.111-111";

            DB::table('clientes')->insert([
                'nome' => $nome,'cpf'=>$cpf,'telefone'=>$telefone,
                'idade' => $idade,'profissao'=>$profissao,'quantFamiliares'=>$quantFamiliares,
                'rua' => $rua,'bairro'=>$bairro,'numero'=>$numero,
                'complemento' => $complemento,'cidade'=>$cidade,'cep'=>$cep,
            ]);
        }

        return redirect('/')->with('msgSucesso','Clientes gerados com sucesso!');

    }
}
