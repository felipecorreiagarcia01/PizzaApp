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
                <input class="form-control" type="text" name="nome" id="nome" value="{{($cliente)? $cliente->nome : old('nome')}}" required>
        </div>

        <div class="col-md-3">
            <label class="form-label" for="ddd" >
                DDD
            </label>
                <input class="form-control" type="tel" name="ddd" id="ddd" value="{{($cliente)? $cliente->ddd : old('ddd')}}" required>

        </div>

        <div class="col-md-3">
            <label class="form-label" for="celular" >
                Celular
            </label>

                <input class="form-control" type="tel" name="celular" id="celular" value="{{($cliente)? $cliente->celular : old('celular')}}" required>


        </div>

        <div class="col-md-3">
            <label class="form-label" for="email" >
                Email
            </label>
                <input class="form-control" type="email" name="email" id="email" value="{{($cliente)? $cliente->email : old('email')}}">
        </div>

        <div class="col-12 mt-3">
            <label class="form-label" for="observacoes">
                Observações
            </label>

            <textarea class="form-control" name="observacoes" id="observacoes">{{($cliente)? $cliente->observacoes : old('observacoes')}}</textarea>
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
