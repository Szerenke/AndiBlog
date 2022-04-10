<div>

    <main>
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
                    </ul>
                    <div class="p-3">
                        @foreach($categories as $category)
                            <input checked wire:model="selectedCategories" class="form-check-input" type="checkbox" value="{{ $category->id }}" >
                            <label class="form-check-label" for="category.{{ $category->id }}">
                                <span class="badge badge-pill bg-{{ $category->category_colour }}">{{ $category->category_name }}</span>
                            </label>
                        @endforeach
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="{{ __('Search') }}" wire:model="searchText">
                    </div>
                </div>
            </div>
        </nav>
        <div class="album py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    @foreach($posts as $post)
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <h4>{{ $post->post_title }}</h4>
                                </div>

                                <div class="card-body">
                                    <p class="card-text">{{ $post->post_intro }}</p>
                                    <div class="d-flex justify-content-center align-items-center">
                                        @foreach($post->categories()->get() as $category)
                                            <h6><span class="badge badge-pill alert-{{ $category->category_colour }}">
                                            {{ $category->category_name }}
                                        </span></h6>

                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary">
                                                <a href="{{ route('posts.show', $post->id) }}">@include('components.icons.eye-icon')</a>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary">
                                                <a href="{{ route('posts.edit', $post->id) }}">@include('components.icons.edit-icon')</a>
                                            </button>
                                            <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>@include('components.icons.delete-icon')</button>
                                            </form>
                                        </div>
                                        <small class="text-muted">{{ date('Y.m.d', strtotime($post->created_at)) }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Biztosan törli a cikket?`,
            text: "A művelet nem visszafordítható!",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
