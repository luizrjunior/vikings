@extends('layouts.app')

@section('javascript')
<script type="text/javascript" src="{{ asset('/js/cartorios/cad-cartorios.js') }}"></script>
@endsection

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card uper">
                <div class="card-header">
                    Adicionar Cartório
                    <a href="{{ url('/cartorios') }}" class="float-right" onclick="return validar()">
                        <i class="fa fa-arrow-left"></i> Voltar
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('cartorios.store') }}" autocomplete="off">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-3 {{ $errors->has('cartorio_status') ? 'text-danger' : '' }}">
                                <label for="name">Ativo (*)</label>
                                <select id="cartorio_status" name="cartorio_status" 
                                    class="form-control {{ $errors->has('cartorio_status') ? 'is-invalid' : '' }}">
                                    <option value="">- - - -</option>
                                    @foreach ($statusCartorio as $status)
                                        <option value="{{$status['id']}}">{{$status['nome']}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('cartorio_status') }}</span>
                            </div>

                            <div class="col-md-9 {{ $errors->has('cartorio_nome') ? 'text-danger' : '' }}">
                                <label for="name">Nome (*)</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_nome') ? 'is-invalid' : '' }}" 
                                    name="cartorio_nome" value="{{ old('cartorio_nome') }}" autofocus />
                                <span class="text-danger">{{ $errors->first('cartorio_nome') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-9 {{ $errors->has('cartorio_razao') ? 'text-danger' : '' }}">
                                <label for="name">Razão (*)</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_razao') ? 'is-invalid' : '' }}" 
                                    name="cartorio_razao" value="{{ old('cartorio_razao') }}" />
                                <span class="text-danger">{{ $errors->first('cartorio_razao') }}</span>
                            </div>

                            <div class="col-md-3 {{ $errors->has('cartorio_tipo_documento') ? 'text-danger' : '' }}">
                                <label for="name">Tipo Documento (*)</label>
                                <select id="cartorio_tipo_documento" name="cartorio_tipo_documento" 
                                    class="form-control {{ $errors->has('cartorio_tipo_documento') ? 'is-invalid' : '' }}">
                                    <option value="">- - - -</option>
                                    @foreach ($tiposDocumentos as $tipoDocumento)
                                        <option value="{{$tipoDocumento['id']}}">{{$tipoDocumento['nome']}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('cartorio_tipo_documento') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 {{ $errors->has('cartorio_documento') ? 'text-danger' : '' }}">
                                <label for="name">Documento (*)</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_documento') ? 'is-invalid' : '' }}" 
                                    name="cartorio_documento" value="{{ old('cartorio_documento') }}" />
                                <span class="text-danger">{{ $errors->first('cartorio_documento') }}</span>
                            </div>

                            <div class="col-md-6 {{ $errors->has('cartorio_cep') ? 'text-danger' : '' }}">
                                <label for="name">CEP (*)</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_cep') ? 'is-invalid' : '' }}" 
                                    name="cartorio_cep" value="{{ old('cartorio_cep') }}" />
                                <span class="text-danger">{{ $errors->first('cartorio_cep') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-9 {{ $errors->has('cartorio_endereco') ? 'text-danger' : '' }}">
                                <label for="name">Endereço (*)</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_endereco') ? 'is-invalid' : '' }}" 
                                    name="cartorio_endereco" value="{{ old('cartorio_endereco') }}" />
                                <span class="text-danger">{{ $errors->first('cartorio_endereco') }}</span>
                            </div>

                            <div class="col-md-3 {{ $errors->has('cartorio_bairro') ? 'text-danger' : '' }}">
                                <label for="name">Bairro (*)</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_bairro') ? 'is-invalid' : '' }}" 
                                    name="cartorio_bairro" value="{{ old('cartorio_bairro') }}" />
                                <span class="text-danger">{{ $errors->first('cartorio_bairro') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 {{ $errors->has('cartorio_uf') ? 'text-danger' : '' }}">
                                <label for="name">UF (*)</label>
                                <select id="cartorio_uf" name="cartorio_uf" 
                                    class="form-control {{ $errors->has('cartorio_uf') ? 'is-invalid' : '' }}">
                                    <option value="">- - - -</option>
                                    @foreach ($ufs as $uf)
                                        <option value="{{$uf['sigla']}}">{{$uf['sigla']}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('cartorio_uf') }}</span>
                            </div>

                            <div class="col-md-9 {{ $errors->has('cartorio_cidade') ? 'text-danger' : '' }}">
                                <label for="name">Cidade (*)</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_cidade') ? 'is-invalid' : '' }}" 
                                    name="cartorio_cidade" value="{{ old('cartorio_cidade') }}" />
                                <span class="text-danger">{{ $errors->first('cartorio_cidade') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-9 {{ $errors->has('cartorio_email') ? 'text-danger' : '' }}">
                                <label for="email">Email</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_email') ? 'is-invalid' : '' }}" 
                                    name="cartorio_email" value="{{ old('cartorio_email') }}" />
                                <span class="text-danger">{{ $errors->first('cartorio_email') }}</span>
                            </div>

                            <div class="col-md-3 {{ $errors->has('cartorio_telefone') ? 'text-danger' : '' }}">
                                <label for="phone">Telefone</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_telefone') ? 'is-invalid' : '' }}" 
                                    name="cartorio_telefone" value="{{ old('cartorio_telefone') }}" 
                                    placeholder="(99) 99999-9999" />
                                <span class="text-danger">{{ $errors->first('cartorio_telefone') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md 12 {{ $errors->has('cartorio_tabeliao') ? 'text-danger' : '' }}">
                                <label for="company">Tabelião (*)</label>
                                <input type="text" class="form-control {{ $errors->has('cartorio_tabeliao') ? 'is-invalid' : '' }}" 
                                    name="cartorio_tabeliao" value="{{ old('cartorio_tabeliao') }}" />
                                <span class="text-danger">{{ $errors->first('cartorio_tabeliao') }}</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="return validar()">Adicionar</button>
                        <span class="float-right text-danger">
                            * Campos obrigatórios
                        </span>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
