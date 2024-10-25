@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h1>Atualização de produto</h1>
</div>

<div class="container-fluid">

    <form class="row g-3" method="POST" action="/update/produto/{{$produto->codProd}}">
    @csrf
    @method('PUT')
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="{{$produto->nome}}" maxlength="250" class="form-control" id="nome" required>
        </div>
        <div class="col-md-6">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" value="{{$produto->marca}}" maxlength="250" class="form-control" id="marca" required>
        </div>
        <div class="col-md-6">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" name="categoria" value="{{$produto->categoria}}" maxlength="250" class="form-control" id="categoria" required>
        </div>
        <div class="col-md-6">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" name="preco" value="{{$produto->preco}}" step=".01" class="form-control" id="preco" required>
        </div>
        <div class="col-12" id="box-form-btn">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>

</div>

@section('main_script',asset('../js/mascara_inputs.js'))

@endsection


