<div class="wrapper container-fluid">

    {!! Form::open([
                    'url' => route('pageEdit', ['page'=>$data['id']]),
                    'class'=>'form-horizontal',
                    'method' => 'post',
                    'enctype'=>'multipart/form-data'
                    ]) !!}


    <div class="form-group">
        {!! Form::hidden('id', $data['id']) !!}

        {!! Form::label('title','Название',['class' => 'col-xs-2 control-label'])   !!}
        <div class="col-xs-8">
            {!! Form::text('title',$data['title'],['class' => 'form-control','placeholder'=>'Введите название страницы'])!!}
        </div>

    </div>


    <div class="form-group">
        {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', $data['alias'], ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $data['text'], ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_image', 'Текущее изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Html::image('assets/img/'.$data['image'],
            '',
            ['class'=>'img-circle img-responsive','width'=>'150px']) !!}
            {!! Form::hidden('old_image', $data['image']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
        </div>
    </div>

    {{ Form::close() }}

    <script>
        CKEDITOR.replace('editor');
    </script>
</div>