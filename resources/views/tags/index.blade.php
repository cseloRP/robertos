@extends('main')

@section('title', '| Tags')

@section('content')
<div class="row">
    <div class="col-md-12">
            <h1>Tags</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Name</th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th>{{ $tag->id }}</th>
                    <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-delete"></span></a>
                    </td>
                    <td>
                        {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
                        {{Form::button('<span class="glyphicon glyphicon-delete"></span>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs pull-right'))}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <div class="well">
            <h2>New Tag</h2>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ Form::submit('Create new Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection