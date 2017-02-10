<div style="margin:0 50px;">
    @if(isset($pages) && is_object($pages))
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Псевдоним</th>
                <th>Текст</th>
                <th>Дата создания</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $k => $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{!! Html::link(route('pageEdit', ['page' => $page->id]), ucfirst($page->title), ['alt' => $page->title]) !!}</td>
                    <td>{{ $page->alias }}</td>
                    <td>{{ $page->text }}</td>
                    <td>{{ $page->created_at }}</td>
                    <td>{!! Form::open([
                    'url' => route('pageEdit', ['page' => $page->id]),
                    'class' => 'form-horisontal',
                    'method' => 'post'
                    ]) !!}

                        <!-- подмена типа запроса, прописан post,
                        мы ниже указываем delete иначе данные через delete не отправить -->
                        {{ method_field('delete') }}
                        {!! Form::button('Удалить', ['class'=>'btn btn-danger','type'=>'submit']) !!}

                    {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    {!! Html::link(route('pageAdd'), 'Новая страница',['class'=>'btn btn-default']) !!}
</div>
