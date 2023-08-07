<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuario.index') }}">
                        <i class="fa-solid fa-eye"></i>
                        Todos os usuários
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuario.edit', ['id' => $user->id]) }}">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Editar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
