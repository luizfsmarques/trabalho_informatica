<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PlanilhaController extends Controller
{
    
    public function gerar()
    {

        //PARA OS CLIENTES
        $ClienteController = new ClienteController();
        $clientes = $ClienteController->retorna_clientes();

        // Criando uma nova planilha
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->setTitle('Clientes');
        $sheet = $spreadsheet->getActiveSheet();

        // Definindo o cabeçalho da planilha
        $sheet->setCellValue('A1', 'codCli');
        $sheet->setCellValue('B1', 'nome');
        $sheet->setCellValue('C1', 'cpf');
        $sheet->setCellValue('D1', 'telefone');
        $sheet->setCellValue('E1', 'idade');
        $sheet->setCellValue('F1', 'profissao');
        $sheet->setCellValue('G1', 'quantFamiliares');
        $sheet->setCellValue('H1', 'bairro');
        $sheet->setCellValue('I1', 'rua');
        $sheet->setCellValue('J1', 'numero');
        $sheet->setCellValue('K1', 'complemento');
        $sheet->setCellValue('L1', 'cidade');
        $sheet->setCellValue('M1', 'cep');

        // Preenchendo a planilha com os dados
        $rowCount = 2;
        foreach( $clientes as $cliente ) {
            $sheet->setCellValue('A' . $rowCount, $cliente->codCli);
            $sheet->setCellValue('B' . $rowCount, $cliente->nome);
            $sheet->setCellValue('C' . $rowCount, $cliente->cpf);
            $sheet->setCellValue('D' . $rowCount, $cliente->telefone);
            $sheet->setCellValue('E' . $rowCount, $cliente->idade);
            $sheet->setCellValue('F' . $rowCount, $cliente->profissao);
            $sheet->setCellValue('G' . $rowCount, $cliente->quantFamiliares);
            $sheet->setCellValue('H' . $rowCount, $cliente->bairro);
            $sheet->setCellValue('I' . $rowCount, $cliente->rua);
            $sheet->setCellValue('J' . $rowCount, $cliente->numero);
            $sheet->setCellValue('K' . $rowCount, $cliente->complemento);
            $sheet->setCellValue('L' . $rowCount, $cliente->cidade);
            $sheet->setCellValue('M' . $rowCount, $cliente->cep);

            $rowCount++;
        }

        // PARA OS PRODUTOS
        $ProdutoController = new ProdutoController();
        $produtos = $ProdutoController->retorna_produtos();

        $spreadsheet->createSheet();
        // Zero based, so set the second tab as active sheet
        $spreadsheet->setActiveSheetIndex(1);
        $spreadsheet->getActiveSheet()->setTitle('Produtos');

        $sheet = $spreadsheet->getActiveSheet();

        // Definindo o cabeçalho da planilha
        $sheet->setCellValue('A1', 'codProd');
        $sheet->setCellValue('B1', 'nome');
        $sheet->setCellValue('C1', 'marca');
        $sheet->setCellValue('D1', 'categoria');
        $sheet->setCellValue('E1', 'preco');

        // Preenchendo a planilha com os dados
        $rowCount = 2;
        foreach( $produtos as $produto ) {
            $sheet->setCellValue('A' . $rowCount, $produto->codProd);
            $sheet->setCellValue('B' . $rowCount, $produto->nome);
            $sheet->setCellValue('C' . $rowCount, $produto->marca);
            $sheet->setCellValue('D' . $rowCount, $produto->categoria);
            $sheet->setCellValue('E' . $rowCount, $produto->preco);

            $rowCount++;
        }

        // PARA OS PEDIDOS
        $PedidoController = new PedidoController();
        $pedidos = $PedidoController->retorna_pedidos();

        $spreadsheet->createSheet();
        // Zero based, so set the second tab as active sheet
        $spreadsheet->setActiveSheetIndex(2);
        $spreadsheet->getActiveSheet()->setTitle('Pedidos');
        $sheet = $spreadsheet->getActiveSheet();

        // Definindo o cabeçalho da planilha
        $sheet->setCellValue('A1', 'codCli');
        $sheet->setCellValue('B1', 'codProd');
        $sheet->setCellValue('C1', 'data');
        $sheet->setCellValue('D1', 'hora');
        $sheet->setCellValue('E1', 'quantidade');

        // Preenchendo a planilha com os dados
        $rowCount = 2;
        foreach( $pedidos as $pedido ) {
            $sheet->setCellValue('A' . $rowCount, $pedido->codCli);
            $sheet->setCellValue('B' . $rowCount, $pedido->codProd);
            $sheet->setCellValue('C' . $rowCount, $pedido->data);
            $sheet->setCellValue('D' . $rowCount, $pedido->hora);
            $sheet->setCellValue('E' . $rowCount, $pedido->quantidade);

            $rowCount++;
        }

        $spreadsheet->setActiveSheetIndex(0);

        // Definindo cabeçalhos para o download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="planilha-informatica-iff.xlsx"');
        header('Cache-Control: max-age=0');

        // Escrevendo o arquivo diretamente para o PHP output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        return redirect('/')->with('msgSucesso','Planilha gerada com sucesso!');
        
    }

    public function gerar_clientes()
    {

        $ClientesController = new ClienteController();
        $clientes = $ClientesController->retorna_clientes();

        // Criando uma nova planilha
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Definindo o cabeçalho da planilha
        $sheet->setCellValue('A1', 'codCli');
        $sheet->setCellValue('B1', 'nome');
        $sheet->setCellValue('C1', 'cpf');
        $sheet->setCellValue('D1', 'telefone');
        $sheet->setCellValue('E1', 'idade');
        $sheet->setCellValue('F1', 'profissao');
        $sheet->setCellValue('G1', 'quantFamiliares');
        $sheet->setCellValue('H1', 'bairro');
        $sheet->setCellValue('I1', 'rua');
        $sheet->setCellValue('J1', 'numero');
        $sheet->setCellValue('K1', 'complemento');
        $sheet->setCellValue('L1', 'cidade');
        $sheet->setCellValue('M1', 'cep');

        // Preenchendo a planilha com os dados
        $rowCount = 2;
        foreach( $clientes as $cliente ) {
            $sheet->setCellValue('A' . $rowCount, $cliente->codCli);
            $sheet->setCellValue('B' . $rowCount, $cliente->nome);
            $sheet->setCellValue('C' . $rowCount, $cliente->cpf);
            $sheet->setCellValue('D' . $rowCount, $cliente->telefone);
            $sheet->setCellValue('E' . $rowCount, $cliente->idade);
            $sheet->setCellValue('F' . $rowCount, $cliente->profissao);
            $sheet->setCellValue('G' . $rowCount, $cliente->quantFamiliares);
            $sheet->setCellValue('H' . $rowCount, $cliente->bairro);
            $sheet->setCellValue('I' . $rowCount, $cliente->rua);
            $sheet->setCellValue('J' . $rowCount, $cliente->numero);
            $sheet->setCellValue('K' . $rowCount, $cliente->complemento);
            $sheet->setCellValue('L' . $rowCount, $cliente->cidade);
            $sheet->setCellValue('M' . $rowCount, $cliente->cep);

            $rowCount++;
        }

        // Definindo cabeçalhos para o download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="clientes.xlsx"');
        header('Cache-Control: max-age=0');

        // Escrevendo o arquivo diretamente para o PHP output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');

        return redirect('/')->with('msgSucesso','Planilha gerada com sucesso!');
        
    }

}
