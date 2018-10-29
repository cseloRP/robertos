@extends('main')

@section('title', '| Blog')

@section('content')
<div class="row">
    <div class="col-md-12">
            <h1>Albums</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-9">
        @if(count($albums))
        <table class="table">
            <thead>
            <th>Cover</th>
            <th>#</th>
            <th>Name</th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($albums as $album)
                <tr>
                    <td style="width: 20%;">
                        @if($album->cover_image)
                            <img alt="" src="{{url(Storage::url($album->cover_image))}}" style="width: 100%;"></img>
                        @endif
                    </td>
                    <th>{{ $album->id }}</th>
                    <td><a href="{{ route('album.show', $album->id) }}">{{ $album->name }}</a></td>
                    <td>
                        <a href="{{ route('album.edit', $album->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-delete">Edit</span></a>
                    </td>
                    <td>
                        {{ Form::open(['route' => ['album.destroy', $album->id], 'method' => 'DELETE']) }}
                        {{Form::button('<span class="glyphicon glyphicon-delete">Delete</span>', array('type' => 'submit', 'class' => 'btn btn-danger pull-right'))}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            Nincs megjeleníthető album.
        @endif
        <div class="text-center">
            {!!  $albums->links() !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="well">
            {!! Form::open(['route' => 'album.store', 'method' => 'POST']) !!}
            <h2>Create new Album</h2>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ Form::submit('Create new album', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection