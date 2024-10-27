@extends('layouts.main')

@section('content')

<div class="container-fluid">
    <h1>Lista dos itens pedidos</h1>
    <p>Quantidade: {{count($pedidos)}}</p>
</div>

<div class="container-fluid">

@if( count($pedidos) == 0 )

    <p>Não existem registros no momento.</p>

@else

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

@endif

</div>




@endsection
