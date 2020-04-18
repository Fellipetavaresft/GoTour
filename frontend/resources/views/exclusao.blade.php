@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <b>Tem certeza que deseja excluir o pacote abaixo?</b>
                </div>
                <div class="card">
                    <div class="card-header">Excluir Pacote</div>
                    <div class="card-body">
                        <form method="POST" action="/pacote/exclusao">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $pacote['dados']['id'] }}">
                            <div class="form-group row mb-0">
                                <table class="table table-striped">
                                    <thead>
                                    <th>ID</th>
                                    <th>Pacote</th>
                                    <th>Valor</th>
                                    <th>Data de início</th>
                                    <th>Data de Término</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $pacote['dados']['id'] }}</td>
                                        <td>{{ $pacote['dados']['pacote']['nome'] }}</td>
                                        <td>R$ {{ $pacote['dados']['pacote']['valor'] }}</td>
                                        <td>{{ date('d/m/Y',$pacote['dados']['pacote']['dataInicio']) }}</td>
                                        <td>{{ date('d/m/Y',$pacote['dados']['pacote']['dataFim']) }}</td>
                                        <td>
                                            <a href="{{ URL::previous() }}" class="btn btn-info btn-sm">voltar</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Confirmar</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
