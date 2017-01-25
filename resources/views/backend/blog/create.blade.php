@extends('backend.layouts.main')
@section('title', 'Новости')
@section('headerScript')

@endsection
@section('content')
    <h2 class="text-center">Создать статью</h2>

    <?
    foreach ($errors->all(':message') as $message) {
        echo '<li class="bg-danger" >' . $message . '</li>';
    }
    ?>

    {{ Form::open(array('url' => 'admin/blog', 'novalidate' => 'novalidate', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('title', 'Название статьи') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('link', 'Адрес статьи(URL)') }}
        {{ Form::text('link', Input::old('link'), array('class' => 'form-control','placeholder' =>asset('/').'blog/')) }}
    </div>

    <div class="form-group">
        {{ Form::label('text_short', 'Анонс') }}
        {{ Form::text('text_short', Input::old('text_short'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('text', 'Описание') }}
        {{ Form::text('text', Input::old('text'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {!! Form::label('Изображение') !!}
        {!! Form::file('image', null) !!}
    </div>

    {{ Form::submit('Создать ', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}


@endsection


