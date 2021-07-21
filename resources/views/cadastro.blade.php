@extends('template.template')

@section('corpo')
    <div class="col-lg-12">
        @if (Session::get('success'))
            <div class=" col-md-12 alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('error'))
            <div class=" col-md-12 alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">

                <h4>Dados do Profissional</h4>
            </div>
            <div class="card-body">
                <div class="default-tab">
                    <div class="tab-content" id="myTabContent">
                        <!--Início dos Dados Principais -->
                        <div class="tab-pane fade show active" id="principal" role="tabpanel"
                            aria-labelledby="principal-tab">
                            <div class="card">
                                <div class="card-body card-block">
                                    <form action="{{ route('cadastrar.submit') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-9 col-xs-4">
                                                <div class="form-group">
                                                    <label for="nome" class="text-dark form-control-label">Nome:</label>
                                                    <input type="text" name="nome" id="nome" size="40" placeholder="Nome"
                                                        class="form-control" value="{{ old('nome') }}">
                                                    @if ($errors->has('nome'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('nome') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-4">
                                                <div class="form-group">
                                                    <label for="dataNascimento" class="text-dark form-control-label">D.
                                                        Nascimento:</label>
                                                    <input type="date" name="dataNascimento" id="dataNascimento"
                                                        placeholder="Data de Nascimento" class="form-control"
                                                        value="{{ old('dataNascimento') }}">
                                                    @if ($errors->has('dataNascimento'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('dataNascimento') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-xs-4">
                                                <div class="form-group">
                                                    <label for="cep" class="text-dark form-control-label">CEP:</label>
                                                    <input type="number" size="8" name="cep" id="cep" value="{{ old('cep') }}"
                                                        placeholder="CEP" class="form-control">
                                                    @if ($errors->has('cep'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('cep') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-xs-4">
                                                <div class="form-group">
                                                    <label for="rua" class=" text-dark form-control-label">Cidade:</label>
                                                    <input type="text" name="cidade" id="cidade" placeholder="Rua/Av."
                                                        value="{{ old('cidade') }}" class="form-control">
                                                    @if ($errors->has('cidade'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('cidade') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-4">
                                                <div class="form-group">
                                                    <label for="estado" class=" text-dark form-control-label">UF:</label>
                                                    <input type="text" size="2" readonly name="estado" id="estado" placeholder="UF"
                                                        value="{{ old('estado') }}" class="form-control">
                                                    @if ($errors->has('estado'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('estado') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-xs-4">
                                                <div class="form-group">
                                                    <label for="rua" class=" text-dark form-control-label">Rua:</label>
                                                    <input type="text" name="rua" size="40" id="rua" placeholder="Rua/Av."
                                                        class="form-control" value="{{ old('rua') }}">
                                                    @if ($errors->has('rua'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('rua') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-4">
                                                <div class="form-group">
                                                    <label for="numero" class="text-dark form-control-label">Número:</label>
                                                    <input type="number" size="6" name="numero" id="numero" placeholder="Número"
                                                        class="form-control" value="{{ old('numero') }}">
                                                    @if ($errors->has('numero'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('numero') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-12 col-xs-4">
                                                <div class="form-group">
                                                    <label for="bairro" class="text-dark form-control-label">Bairro:</label>
                                                    <input type="text" size="40" name="bairro" id="bairro" placeholder="Bairro"
                                                        class="form-control" value="{{ old('bairro') }}">
                                                    @if ($errors->has('bairro'))
                                                        <div class="div-invalid-feedback ">
                                                            {{ $errors->first('bairro') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success">Salvar</button>
                                </div>
                                </form>

                            </div>
                        </div>

                        <!-- Fim dos Dados Principais -->

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





</section>
