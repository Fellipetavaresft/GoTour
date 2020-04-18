@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="">

        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('mensagem'))
                    <div class="alert alert-success">
                        {{ session('mensagem') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('erro'))
                    <div class="alert alert-danger">
                        {{ session('erro') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($pacotes['status'] == 0)
                    <div class="alert alert-danger">
                        {{ $pacotes['erro'] }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(empty($pacotes['dados']))
                    <div class="alert alert-info">
                        Não há pacotes cadastrados
                    </div>
                @elseif($pacotes['status'] == 200)
                    <div class="card">
                        <div class="card-header">Listagem de Pacotes</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Pacote</th>
                                <th>Valor</th>
                                <th>Data de início</th>
                                <th>Data de Término</th>
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($pacotes['dados'] as $pacote)
                                    <tr>
                                        <td>{{ $pacote['id'] }}</td>
                                        <td>{{ $pacote['nome'] }}</td>
                                        <td>R$ {{ $pacote['valor'] }}</td>
                                        <td>{{ date('d/m/Y',$pacote['dataInicio']) }}</td>
                                        <td>{{ date('d/m/Y',$pacote['dataFim']) }}</td>
                                        <td><a href="\pacote\edicao\{{$pacote['id']}}"
                                               class="btn btn-secondary btn-sm">Detalhes</a></td>
                                        <td><a href="\pacote\exclusao\{{ $pacote['id'] }}"
                                               class="btn btn-danger btn-sm">remover</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
