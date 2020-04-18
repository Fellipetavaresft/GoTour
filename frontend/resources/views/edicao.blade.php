@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $pacote['dados']['pacote']['nome'] }}</div>
                    <div class="card-body">
                        <form method="POST" action="/pacote/edicao" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                                <div class="col-md-6">
                                    <input type="hidden" value="{{ $pacote['dados']['id'] }}" name="id">
                                    <input id="nome" type="text"
                                           class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                           name="nome" value="{{ $pacote['dados']['pacote']['nome'] }}"
                                           required autofocus>

                                    @if ($errors->has('nome'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="valor" class="col-md-4 col-form-label text-md-right">Valor</label>

                                <div class="col-md-6">
                                    <input id="valor" type="text"
                                           class="form-control{{ $errors->has('valor') ? ' is-invalid' : '' }}"
                                           name="valor"
                                           value="{{ $pacote['dados']['pacote']['valor'] }}" required
                                           autofocus>

                                    @if ($errors->has('valor'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('valor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dataInicio" class="col-md-4 col-form-label text-md-right">Data de
                                    Início</label>

                                <div class="col-md-6">
                                    <input id="dataInicio" type="date"
                                           class="form-control{{ $errors->has('dataInicio') ? ' is-invalid' : '' }}"
                                           name="dataInicio"
                                           value="{{ date('Y-m-d',$pacote['dados']['pacote']['dataInicio']) }}"
                                           required autofocus>

                                    @if ($errors->has('dataInicio'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataInicio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dataFim" class="col-md-4 col-form-label text-md-right">Data de Fim</label>

                                <div class="col-md-6">
                                    <input id="dataFim" type="date"
                                           class="form-control{{ $errors->has('dataFim') ? ' is-invalid' : '' }}"
                                           name="dataFim"
                                           value="{{ date('Y-m-d',$pacote['dados']['pacote']['dataFim']) }}"
                                           required autofocus>

                                    @if ($errors->has('dataFim'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dataFim') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="text"
                                           class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}"
                                           name="telefone" value="{{ $pacote['dados']['telefone'] }}"
                                           required autofocus>

                                    @if ($errors->has('telefone'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="site" class="col-md-4 col-form-label text-md-right">Site</label>

                                <div class="col-md-6">
                                    <input id="site" type="text"
                                           class="form-control{{ $errors->has('site') ? ' is-invalid' : '' }}"
                                           name="site" value="{{ $pacote['dados']['site'] }}" required
                                           autofocus>

                                    @if ($errors->has('site'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('site') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="urlImagem" class="col-md-4 col-form-label text-md-right">Imagem</label>

                                <div class="col-md-6">
                                    <input type="file" id="urlImagem"
                                           class="form-control{{ $errors->has('urlImagem') ? ' is-invalid' : '' }}"
                                           name="urlImagem" value="{{ old('urlImagem') }}" autofocus>

                                    @if ($errors->has('imagem'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('urlImagem') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                                <div class="col-md-6">
                                <textarea rows="6" id="descricao"
                                          class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}"
                                          name="descricao" required autofocus>{{ $pacote['dados']['descricao'] }}
                                </textarea>

                                    @if ($errors->has('descricao'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ URL::previous() }}" class="btn btn-info btn-sm">voltar</a>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Alterar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Imagem do pacote</div>
                    <div class="card-body ">
                        <div class="row justify-content-center">
                            <img src={{ $pacote['dados']['urlImagem'] }} />
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
