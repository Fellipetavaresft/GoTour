@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Novo Pacote
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/pacote/cadastro" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                           class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                           name="nome" value="{{ old('nome') }}" required autofocus>

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
                                           name="valor" value="{{ old('valor') }}" required autofocus>

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
                                           name="dataInicio" value="{{ old('dataInicio') }}" required autofocus>

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
                                           name="dataFim" value="{{ old('dataFim') }}" required autofocus>

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
                                           name="telefone" value="{{ old('telefone') }}" required autofocus>

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
                                           name="site" value="{{ old('site') }}" required autofocus>

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
                                    @if ($errors->has('imagem'))
                                        <span class="help-block">
                                            <strong>Erro na validação da imagem</strong>
                                        </span>
                                    @endif
                                    <input type="file" id="urlImagem"
                                           class="form-control{{ $errors->has('urlImagem') ? ' is-invalid' : '' }}"
                                           name="urlImagem" value="{{ old('urlImagem') }}" autofocus>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                                <div class="col-md-6">
                                    <textarea id="descricao"
                                              class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}"
                                              name="descricao" required
                                              autofocus>{{ old('descricao') }}</textarea>

                                    @if ($errors->has('detalhes'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('detalhes') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
