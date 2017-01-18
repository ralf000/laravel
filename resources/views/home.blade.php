@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-md-3">
                                <a href="/admin/add/post" class="btn btn-default">Add new Page</a>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @forelse($pages as $page)
                            <h3>{{ $page->title }}</h3>
                            <p>{{ $page->text }}</p>
                            <p><a href="admin/update/post/{{ $page->id }}" class="btn btn-primary">Update</a></p>
                        @empty
                            <p>Ничего не найдено</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
