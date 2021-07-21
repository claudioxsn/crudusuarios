@extends('template.template')

@section('corpo')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Session::get('success'))
                    <div class=" col-md-10 alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('error'))
                    <div class=" col-md-12 alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if (count($usuarios) == 0)
                    <div class=" col-md-12 alert alert-danger" role="alert">
                        Não há usuarios cadastrados.
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ route('usuarios.list') }}" method="get">

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Pesquisar" name="pesquisa"
                                        aria-label="Pesquisar" aria-describedby="button-addon2">
                                    <button type="submit" class="btn btn-outline-secondary" type="button"
                                        id="button-addon2">Pesquisar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- DATA TABLE -->
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-hover table-data2">
                        <thead >
                            <tr class="bg-white">
                                <th class="w-25 p-3">Nome</th>
                                <th class="w-10 p-3">Data de Nascimento</th>
                                <th class="w-20 p-3">Cidade</th>
                                <th class="w-30 p-3">Ações</th>
                            </tr>
                            <tr class="spacer"></tr>
                        </thead>
                        <tbody>

                            @if (is_null($usuarios)){
                                <tr class="tr-shadow">
                                    <td class="w-5 p-3">
                                        <p>Não há usuários cadastrados</p>
                                    </td>
                                </tr>
                                }
                            @endif

                            @foreach ($usuarios as $u)
                                <tr class="tr-shadow">
                                    <td class="w-25 p-3">{{ $u->nome }}</td>
                                    <td class="w-10 p-3">{{ Carbon\Carbon::parse($u->dataNascimento)->format('d/m/Y') }}</td>
                                    <td class="w-10 p-3">{{ $u->cidade }}</td>
                                    <td class="w-30 p-3"><a class="btn btn-primary btn-sm" href="{{ route('usuario.edit', ['id'=>Crypt::encrypt($u->id)]) }}">Editar</a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('usuario.delete', ['id'=> Crypt::encrypt($u->id)]) }}">Excluir</a>
                                    </td>

                                </tr>

                                <tr class="spacer"></tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $usuarios->links() }}
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
        <div class="row m-t-30">
            <div class="col-md-12">
            </div>
        </div>
    </div>

@endsection
