<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produto.index') }}">
                        <i class="fa-solid fa-eye"></i>
                        Todos os produtos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produto.edit', ['id' => $produto->id_produto]) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Editar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
