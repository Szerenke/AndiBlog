<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
    <div class="container">
        <h3 class="navbar-brand">{{ __('Andi Blog') }}</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">{{ __('Cikkek') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('posts.create') }}">{{ __('Új cikk') }}</a>
                </li>
            </ul>
            <form>
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" wire:model="searchText">
            </form>
        </div>
    </div>
</nav>
