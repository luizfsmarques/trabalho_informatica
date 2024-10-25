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
    <a href="/cadastro/cliente" type="button" class="btn btn-primary">Cadastrar cliente</a>
</div>

<div class="container-fluid">
    <h1>Lista dos clientes</h1>
</div>

<div class="container-fluid">
                      
    <div class="accordion" id="accordionExample">

        @foreach($clientes as $cliente)
        
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
                        <div class="col-5 nome-usuario">
                            <p class="">{{strtoupper($cliente->name)}}</p>
                        </div>
                        <div class="col-5 telefone-usuario">
                            <p class="">{{$cliente->telefone}}</p>
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
                            <a href="/atualizar/cliente/{{$cliente->codCli}}" type="button" class="btn btn-primary">Atualizar</a>
                            <a href="/excluir/cliente/{{$cliente->codCli}}" type="button" class="btn btn-danger">Excluir</a>
                        </div>

                        <div class="container">
                            <p>CPF: {{$cliente->telefone}}</p>
                            <p>Idade: {{$cliente->idade}}</p>
                            <p>Profissão: {{$cliente->profissao}}</p>
                            <p>Quantidade de familiares: {{$cliente->quantFamiliares}}</p>
                            <p>CEP: {{$cliente->cep}}</p>
                            <p>Rua: {{$cliente->rua}}</p>
                            <p>Bairro: {{$cliente->bairro}}</p>
                            <p>Cidade: {{$cliente->cidade}}</p>
                            <p>Complemento: {{$cliente->complemento}}</p>
                        </div>

                    </div>
                    
                </div>
            </div>
        @endforeach                        
    
    </div>
</div>




@endsection