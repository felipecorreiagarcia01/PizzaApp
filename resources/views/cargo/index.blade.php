
@extends('layouts.base')
@section('content')

{{-- Menu --}}
@include('layouts.partials.menu')

<h1>
    <i class="bi bi-bag-fill"></i>
    Cargos
</h1>
<div class="row">
    <div class="col-md-3 mt-3">
        <form action="{{ route('cargo.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="form-label" for="cargo">Cadastrar Novo Cargo</label>
            <input class="form-control" type="text" name="cargo" id="cargo">
        </form>
    </div>
    <div class="col-md-3 mt-5">
        <input class="btn btn-success" type="submit" value="Cadastrar">
    </div>
</div>

<p>{{ $cargos->onEachSide(5)->links() }}</p>

{{-- Alerts --}}
@include('layouts.partials.alerts')

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

                    <form action="{{ route('cargo.destroy',['id'=>$cargo->id_cargo])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class=" btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i></button>
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
