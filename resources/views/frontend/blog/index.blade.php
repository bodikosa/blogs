@extends('frontend.layouts.main')
@section('title', 'Новости')
@section('headerScript')
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="text-center">
        {{ link_to('admin/blog', $title = 'Админка', $attributes = ['class'=>'btn btn-primary btn-lg '])}}
    </div>
@foreach($posts as $posts_raw)
    <div class="row">
        @foreach($posts_raw as $value)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="text-center" href="{{ URL::route('blog.show', $value['link']) }}">{{ HTML::image($value['image'] , $value['title'], array('width' => '100' , 'height' => '100'))  }}</a>
                        <div class="caption">
                            <h3>{{ $value['title']}}</h3>
                            <p>{{ $value['text_short']}}</p>
                            <p>Дата публикации: {{ $value['created_at']}}</p>
                            <a href="{{ URL::route('blog.show', $value['link']) }}" class="btn btn-primary" role="button">Посмотреть</a>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endforeach
@endsection

@section('footerScript')
@endsection

