<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pedido.index') }}">
                        <i class="fa-solid fa-eye"></i>
                        Todos os pedidos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pedido.edit', ['id' => $pedido->id_pedido]) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Editar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
