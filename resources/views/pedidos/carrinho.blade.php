@extends('layouts.main')

@section('style',asset('../css/carrinho.css'))

@section('content')

<div class="container-fluid ">

    @if(session('msgSucesso'))
    <div class="alert alert-success" role="alert">
        {{session('msgSucesso')}}
    </div>
    @endif
    
</div>

<div class="container-fluid titulo">
    <h1>Carrinho de compras</h1>
</div>

<div class="container-fluid botao">
    <a href="/finalizar/carrinho/{{$codCli}}" class="btn btn-success">Finalizar pedido</a>
</div>

<!-- <div class="container-fluid">
    <button type="button" class="btn btn-primary">Adicionar produto</button>
</div> -->

<div class="container-fluid" id="box-form">
    <form action="/adicionar/produto/carrinho/{{$codCli}}" method="POST">
    @csrf

        <div class="col-md-6">
            <label for="">Escolha o produto:</label>
            <select class="form-select" name="codProd" aria-label="Default select example">
                @foreach($produtos as $produto)
                    <option value="{{$produto->codProd}}">{{$produto->nome}}</option>
                @endforeach
            </select>
        </div>  

        <div class="col-md-6">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade" value="" step="1" class="form-control" id="quantidade" required>
        </div>   

        <div class="col-12" id="box-form-btn">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>

    </form>
</div>

<div class="container-fluid">

    <ul class="list-group">

        @foreach( $carrinho['produtos'] as $car)
        
          <li class="list-group-item">

            <div class="row">
                <div class="col-md-10">    
                    <p>Produto: {{$car['nome']}}</p>
                    <p>Quantidade: {{$car['quantidade']}}</p>
                    <p>Preço: R${{number_format($car['preco'],2,",",".")}}</p>
                    <p>Subtotal: R${{$car['subTotal']}}</p>
                </div>
                <div class="col-md-2">
                    <a href="/remover/produto/carrinho/{{$codCli}}/{{$car['codProd']}}" class="btn btn-danger">Remover</a>
                </div>
                
            </div>

          </li>

        @endforeach
    </ul>



</div>




@endsection
