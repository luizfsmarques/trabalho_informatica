<div class="container-fluid">

    <form action="/delete/cliente/{{$codCli}}" method="POST">
    @csrf
    @method('DELETE')

        <div class="row">
            <h3>Tem ceterza que deseja excluir este registro do banco de dados?</h3>
        </div>
        <div class="row">
            <a href="/" type="button" class="btn btn-primary">Não</a>
            <button type="submit" class="btn btn-danger">Sim</button>
        </div>
    </form>

</div>