@extends('main')

@section('title', '| Edit tag')

@section('content')
    <div class="row">
        {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}

        </div>
        <div class="col-md-4">
            <div class="well">
                <div class="row">
                    <div class="col-sm-6">
                        {{ Html::linkRoute('tags.show', 'Cancel', array($tag->id), array('class' => 'btn btn-primary btn-block')) }}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection