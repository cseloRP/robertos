@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create new album</h1>
            <hr>
            {!! Form::open(array('route' => 'album.store', 'data-parsley-validate')) !!}
            {{ Form::label('title', 'Album name:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required', 'maxlength' => '255')) }}

            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description', null, array('class' => 'form-control', 'required', 'minlength' => '10', 'maxlength' => '255')) }}

            {{ Form::label('cover', 'Cover image:') }}
            {{ Form::file('cover', ['id' => 'images', 'class' => 'form-control', 'required']) }}

            {{ Form::label('images', 'Images:') }}
            {{ Form::file('images[]', ['id' => 'images', 'class' => 'form-control', 'required', 'multiple']) }}

            {{ Form::submit('Create album', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px' )) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
