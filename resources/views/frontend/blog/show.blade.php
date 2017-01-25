@extends('frontend.layouts.main')
@section('title', $post->title)
@section('headerScript')
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="raw col-offset-2">
        <div class="jumbotron">
            <h1>{{$post->title}}</h1>
            <p>{{$post->text}}</p>
            <p>Дата создания: {{$post->created_at}}</p>
            <p><a class="btn btn-primary btn-sm" href="{{ URL::route('blog')}}" role="button">Все записи</a></p>
        </div>
    </div>
@endsection
@section('footerScript')
@endsection

