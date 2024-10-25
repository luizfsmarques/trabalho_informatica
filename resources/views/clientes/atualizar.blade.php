@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h1>Atualização de cliente</h1>
</div>

<div class="container-fluid">

    <form class="row g-3" method="POST" action="/update/cliente/{{$cliente->codCli}}">
    @csrf
    @method('PUT')
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="{{$cliente->nome}}" maxlength="250" class="form-control" id="nome">
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" value="{{$cliente->cpf}}" maxlength="14" class="form-control" id="cpf">
        </div>
        <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" value="{{$cliente->telefone}}" maxlength="14" class="form-control" id="telefone">
        </div>
        <div class="col-md-6">
            <label for="idade" class="form-label">Idade</label>
            <input type="text" name="idade" value="{{$cliente->idade}}" maxlength="3" class="form-control" id="idade">
        </div>
        <div class="col-md-6">
            <label for="profissao" class="form-label">Profissão</label>
            <input type="text" name="profissao" value="{{$cliente->profissao}}" maxlength="250" class="form-control" id="profissao">
        </div>
        <div class="col-md-6">
            <label for="quantFamiliares" class="form-label">Quantidade de familiares</label>
            <input type="text" name="quantFamiliares" value="{{$cliente->quantFamiliares}}" maxlength="3" class="form-control" id="quantFamiliares">
        </div>
        <div class="col-md-6">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" name="rua" value="{{$cliente->rua}}" maxlength="250" class="form-control" id="rua">
        </div>
        <div class="col-md-6">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" value="{{$cliente->bairro}}" maxlength="250" class="form-control" id="bairro">
        </div>
        <div class="col-md-6">
            <label for="numero" class="form-label">Numero</label>
            <input type="text" name="numero" value="{{$cliente->numero}}" maxlength="3" class="form-control" id="numero">
        </div>
        <div class="col-md-6">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" name="complemento" value="{{$cliente->complemento}}" maxlength="250" class="form-control" id="complemento">
        </div>
        <div class="col-md-6">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" disabled value="Campos dos Goytacazes" maxlength="250" class="form-control" id="cidade">
        </div>
        <div class="col-md-6">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" value="{{$cliente->cep}}" maxlength="10" class="form-control" id="cep">
        </div>                        

        <div class="col-12" id="box-form-btn">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>

</div>

@section('main_script',asset('../js/mascara_inputs.js'))

@endsection


