<!-- Example row of columns -->
<div class="row">
    @forelse($articles as $article)
        <div class="col-md-4">
            <h2>{{ $article->name }}</h2>
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->text }}</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
    @empty
        <h2>Ничего не найдено</h2>
    @endforelse
</div>