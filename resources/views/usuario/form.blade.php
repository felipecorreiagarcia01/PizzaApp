@extends('layouts.base')

@section('content')
{{-- Menu --}}
    @include('layouts.partials.menu')

    <h1>
        <i class="bi bi-person-circle"></i>

        @if ($user)
            Atualizar Usuário
        @else
            Novo Usuário
        @endif
    </h1>
    <form method="post"
        action="{{ $user ? route('usuario.update', ['id' => $user->id]) : route('usuario.store') }}"
        id="produto-form" enctype="multipart/form-data" class="mt-6">
        @csrf

        {{-- Dados do Usuário --}}
        <div class="card-deck">
            <div class="card border-dark mt-1">
                <div class="card-header">
                    <h5>
                        Dados do Usuário
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="id_cargo" class="form-label">Cargo*</label>
                            <select class="form-select" name="id_cargo" id="id_cargo" required>
                                <option value="">Selecione</option>
                                @foreach ($cargo::orderBy('cargo')->get() as $item)
                                    <option value="{{ $item->id_cargo }}"
                                        @selected(old('id_cargo') || ($user && $user->id_cargo == $item->id_cargo))>
                                        {{ $item->cargo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome*</label>
                            <input type="text" class="form-control" name="nome" id="nome"
                                value="{!! $user ? $user->nome : old('nome') !!}" placeholder="Ex.: Pizza de T94" required>
                        </div>

                        <div class="col-12 md-6">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{!! $user ? $user->email : old('email')}}">
                        </div>
                        {{-- <div class="col-12 md-6">
                            <label for="senha" class="form-label">Senha*</label>
                            <input type="password" name="senha" id="senha" class="form-control" value="{{!! $user ? $user->password : old('password')}}">
                        </div> --}}

                    </div>
                    <button class="btn btn-success mt-3 col-md-3 offset-md-9" type="submit"
                        data-loading-text="Salvando...">
                        <i class="fa fa-save"></i>
                        @if ($user)
                            Atualizar Usuário
                        @else
                            Cadastrar Usuário
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
@endsection
