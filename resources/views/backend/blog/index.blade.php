@extends('backend.layouts.main')
@section('title', 'Создать новость')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="pull-right">

    </div>
    <div class="content-box-large">
        <div class="panel-heading">
            <h2>Посты блога</h2>
            <a class="btn btn-success btn-sm " href="{{ URL::to('admin/blog/create') }}"><i class="glyphicon glyphicon-plus"></i> Создать пост</a>
            <form id="logout-form" class="pull-right" action="{{ url('/logout') }}" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-primary btn-sm" type="submit">Выйти из админ панели</button>
            </form>
        </div>

        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Анонс</th>
                <th>Url</th>
                <th>Дата создания</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->title}}</td>
                    <td>{{ $value->text_short}}</td>
                    <td class="center">{{ url('blog', $parameters = array('linl'=>$value->link))}}</td>
                    <td class="center">{{ $value->created_at}}</td>
                    <td class="center">
                        <a class="btn btn-default btn-xs" target="_blank"
                           href="{{ URL::to('blog/' . $value->link) }}"><i class="glyphicon glyphicon-eye-open"></i>
                            View</a>
                        {{ Form::open(array('url' => 'admin/blog/' . $value->id)) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
