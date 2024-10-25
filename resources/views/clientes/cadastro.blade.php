@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h1>Cadastro de cliente</h1>
</div>

<div class="container-fluid">

    <form class="row g-3" method="POST" action="/cadastrar/cliente">
    @csrf

        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="" maxlength="250" class="form-control" id="nome" required>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" value="" maxlength="14" class="form-control" id="cpf" required>
        </div>
        <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" value="" maxlength="14" class="form-control" id="telefone" required>
        </div>
        <div class="col-md-6">
            <label for="idade" class="form-label">Idade</label>
            <input type="text" name="idade" value="" maxlength="3" class="form-control" id="idade" required>
        </div>
        <div class="col-md-6">
            <label for="profissao" class="form-label">Profissão</label>
            <input type="text" name="profissao" value="" maxlength="250" class="form-control" id="profissao" required>
        </div>
        <div class="col-md-6">
            <label for="quantFamiliares" class="form-label">Quantidade de familiares</label>
            <input type="text" name="quantFamiliares" value="" maxlength="3" class="form-control" id="quantFamiliares" required>
        </div>
        <div class="col-md-6">
            <label for="rua" class="form-label">Rua</label>
            <input type="text" name="rua" value="" maxlength="250" class="form-control" id="rua" required>
        </div>
        <div class="col-md-6">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" value="" maxlength="250" class="form-control" id="bairro" required>
        </div>
        <div class="col-md-6">
            <label for="numero" class="form-label">Numero</label>
            <input type="text" name="numero" value="" maxlength="3" class="form-control" id="numero" required>
        </div>
        <div class="col-md-6">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" name="complemento" value="" maxlength="250" class="form-control" id="complemento" required>
        </div>
        <div class="col-md-6">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" disabled value="Campos dos Goytacazes" maxlength="250" class="form-control" id="cidade" required>
        </div>
        <div class="col-md-6">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" value="" maxlength="10" class="form-control" id="cep" required>
        </div>                        

        <div class="col-12" id="box-form-btn">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

</div>

@section('main_script',asset('../js/mascara_inputs.js'))

@endsection


