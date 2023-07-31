@extends('layouts.base')
@section('content')

<h1>
    {{
        ($cliente) ? 'Editar Cliente' : 'Cadastrar Cliente'
    }}
</h1>

<form action="{{ ($cliente) ? route('cliente.update', ['id_cliente' => $cliente->id_cliente]) : route('cliente.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-3">
            <label class="form-label" for="nome">
                Nome*
            </label>

            @if ($cliente)
                <input class="form-control" type="text" name="nome" id="nome" value="{{$cliente->nome}}" required>
            @else
                <input class="form-control" type="text" name="nome" id="nome" required>
            @endif
        </div>

        <div class="col-md-3">
            <label class="form-label" for="ddd" >
                DDD
            </label>

            @if ($cliente)
                <input class="form-control" type="tel" name="ddd" id="ddd" value="{{$cliente->ddd}}" required>
            @else
                <input class="form-control" type="tel" name="ddd" id="ddd" required>
            @endif

        </div>

        <div class="col-md-3">
            <label class="form-label" for="celular" >
                Celular
            </label>

            @if ($cliente)
                <input class="form-control" type="tel" name="celular" id="celular" value="{{$cliente->celular}}" required>
            @else
                <input class="form-control" type="tel" name="celular" id="celular" required>
            @endif

        </div>

        <div class="col-md-3">
            <label class="form-label" for="email" >
                Email
            </label>

            @if ($cliente)
                <input class="form-control" type="email" name="email" id="email" value="{{$cliente->email}}">
            @else
                <input class="form-control" type="email" name="email" id="email" value="">
            @endif

        </div>

        <div class="col-12 mt-3">
            <label class="form-label" for="observacoes">
                Observações
            </label>

            @if ($cliente)
            <textarea class="form-control" name="observacoes" id="observacoes">{!! $cliente->observacoes !!}</textarea>
            @else
            <textarea class="form-control" name="observacoes" id="observacoes"></textarea>
            @endif

        </div>

    </div>
    <div class="mt-4"></div>

    @if ($cliente)
        <input class="btn btn-warning" type="submit" value="Atualizar Cliente">
    @else
        <input class="btn btn-success" type="submit" value="Cadastrar Cliente">
    @endif

</form>

@endsection

{{-- Script --}}
@section('scripts')

@endsection
