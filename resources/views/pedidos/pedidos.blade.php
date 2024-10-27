@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h1>Lista dos itens pedidos</h1>
</div>

<div class="container-fluid">

    <ul class="list-group">

        @foreach( $pedidos as $pedido)
        
          <li class="list-group-item">

            <div class="row">
                <div class="col-md-10">
                    <p>Cliente: {{$pedido['cliente']}}</p>
                    <p>Produto: {{$pedido['produto']}}</p>
                    <p>Marca: {{$pedido['marca']}}</p>
                    <p>Quantidade: {{$pedido['quantidade']}}</p>
                    <p>Data: {{$pedido['data']}}</p>
                    <p>Hora: {{$pedido['hora']}}</p>
                </div>
            </div>

          </li>

        @endforeach
    </ul>



</div>




@endsection
