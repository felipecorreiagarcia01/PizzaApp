
@extends('layouts.base')
@section('content')

{{-- Menu --}}
@include('layouts.partials.menu')

<h1>Cargos</h1>
<div class="row">
    <div class="col-md-2">
        <form action="{{ route('cargo.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        <label class="form-label" for="cargo">Cadastrar Novo Cargo</label>
        <input class="form-control" type="text" name="cargo" id="cargo">
    </div>
    <div class="col-md-3 mt-4">
        <input class="btn btn-success" type="submit" value="Cadastrar">
    </div>
</div>
        </form>
<table class="table table-striped">
     <thead>
        <tr>
            <th>Ações</th>
            <th>ID</th>
            <th>Cargo</th>
        </tr>
     </thead>
     <tbody>
        @foreach ($cargos as $cargo)


        <tr>
            <td>
                <a class="btn btn-primary" href="{{ route('cargo.edit', ['id'=>$cargo->id_cargo]) }}">
                <i class="bi bi-pencil-square"></i>
                </a>
                <a class="btn btn-warning" href="{{ route('cargo.show', ['id'=>$cargo->id_cargo]) }}">
                    <i class="bi bi-eye-fill"></i>
                </a>

                    <form action="{{ route('cliente.destroy',['id_cliente'=>$cargo->id_cargo])}}" method="post">
                        @csrf
                        <button class=" btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
            </td>
            <td>{{ $cargo->id_cargo }}</td>
            <td>{{ $cargo->cargo }}</td>
        </tr>
        @endforeach
     </tbody>
</table>
@endsection
@section('scripts')

@endsection
