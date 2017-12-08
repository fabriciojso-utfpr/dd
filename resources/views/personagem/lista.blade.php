@extends('layout')
@section('content')
    <a class="btn btn-success" style="float: right; margin-top: 30px;" href="{{ action("PersonagemController@create") }}" role="button">Adicionar novo</a>
    <h1 >Lista de personagens</h1>
    <hr style="clear: both" />

    @if(Session::get('adicionado'))
        <div class="alert alert-success">
            Novo <strong>Produto</strong> inserido com sucesso!
        </div>
    @endif

    @if(Session::get('atualizado'))
        <div class="alert alert-info">
            <strong>Produto</strong> atualizado com sucesso!
        </div>
    @endif

    @if(Session::get('deletado'))
        <div class="alert alert-danger">
            O produto <strong>{{ Session::get('deletado') }}</strong> foi deletado com sucesso!
        </div>
    @endif

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th width="30">#</th>
            <th>Nome</th>
            <th class="hidden-xs">Força</th>
            <th class="hidden-xs">Destreza</th>
            <th class="hidden-xs">Constituição</th>
            <th class="hidden-xs">Inteligência</th>
            <th class="hidden-xs">Sabedoria</th>
            <th class="hidden-xs">Carisma</th>
            <th width="152">Ações</th>
        </tr>
        </thead>
        <tbody>

        @foreach($personagens as $personagem)
            <tr>
                <th scope="row">{{ $personagem->id }}</th>
                <td>{{ $personagem->nome }}</td>
                <td class="hidden-xs">{{ $personagem->forca }}</td>
                <td class="hidden-xs">{{ $personagem->destreza }}</td>
                <td class="hidden-xs">{{ $personagem->constituicao }}</td>
                <td class="hidden-xs">{{ $personagem->inteligencia }}</td>
                <td class="hidden-xs">{{ $personagem->sabedoria }}</td>
                <td class="hidden-xs">{{ $personagem->carisma }}</td>
                <td>

                    <form action="{{ route('personagem.destroy', ['id'=>$personagem->id]) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a class="btn btn-primary" href="{{ route('personagem.edit', ['id'=>$personagem->id]) }}" role="button">Editar</a>
                        <button class="btn btn-danger" role="button">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
