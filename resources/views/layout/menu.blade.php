<nav class="navbar navbar-dark navbar-expand-lg bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">Menu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('income.create') }}">Agregar Ingresos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('expenses.create') }}">Agregar Egresos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
