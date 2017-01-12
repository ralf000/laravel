<!-- Example row of columns -->
<div class="row">
    <h2>Страницы пользователя: {{ $user->name }}</h2>
    @forelse($user->pages as $page)
        <div class="col-md-4">
            <h3>{{ $page->title }}</h3>
            <p>{{ $page->text }}</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
    @empty
        <h2>Ничего не найдено</h2>
    @endforelse
    <h2>Автор страницы: {{ $page->title }}</h2>
    <p>{{ $user->name }}</p>
</div>