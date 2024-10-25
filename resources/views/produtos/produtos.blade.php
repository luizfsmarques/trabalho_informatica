@extends('layouts.main')

@section('content')

<div class="container-fluid">

    @if(session('msgSucesso'))
    <div class="alert alert-success" role="alert">
        {{session('msgSucesso')}}
    </div>
    @endif

    @if(session('msgErro'))
    <div class="alert alert-danger" role="alert">
        {{session('msgErro')}}
    </div>
    @endif
</div>

<div class="container-fluid">
    <a href="/cadastro/produto" type="button" class="btn btn-primary">Cadastrar produto</a>
</div>

<div class="container-fluid">
    <h1>Lista dos produtos</h1>
</div>

<div class="container-fluid">
                      
    <div class="accordion" id="accordionExample">

        @foreach($produtos as $produto)
        
            <div class="accordion-item">
                <h2 class="accordion-header">
                @if( $loop->index == 0 )
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$loop->index+1}}" aria-expanded="true" aria-controls="collapse-{{$loop->index+1}}">
                @else
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$loop->index+1}}" aria-expanded="false" aria-controls="collapse-{{$loop->index+1}}">
                @endif
                    
                    <div class="row titulo-usuario">
                        <div class="col-2 img-usuario">
                            <img class="img-perfil" src="{{asset('../img/img-perfil.png')}}" alt="Foto do usuário"> 
                        </div>
                        <div class="col-10 telefone-usuario">
                            <p class="">{{$produto->nome}}</p>
                        </div>
                    </div>

                </button>
                </h2>
                @if( $loop->index == 0 )
                <div id="collapse-{{$loop->index+1}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                @else
                <div id="collapse-{{$loop->index+1}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                @endif
                    
                    <div class="accordion-body">

                        <div class="container">
                            <a href="/atualizar/produto/{{$produto->codProd}}" type="button" class="btn btn-primary">Atualizar</a>
                            <a href="/excluir/produto/{{$produto->codProd}}" type="button" class="btn btn-danger">Excluir</a>
                        </div>

                        <div class="container">
                            <p>Marca: {{$produto->marca}}</p>
                            <p>Categoria: {{$produto->categoria}}</p>
                            <p>Preço: R${{str_replace(".",",", strval($produto->preco) )}}</p>
                        </div>

                    </div>
                    
                </div>
            </div>
        @endforeach                        
    
    </div>
</div>




@endsection