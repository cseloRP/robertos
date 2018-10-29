@extends('main')

@section('title', '| Edit post')

@section('stylesheets')

    {{--<script src="https://cloud.tinymce.com/stable/tinymce.min.js" xmlns="http://www.w3.org/1999/html"></script>--}}

    {{--<script>--}}
        {{--tinymce.init({--}}
            {{--selector:'textarea',--}}
            {{--plugins: 'link',--}}
            {{--toolbar: 'undo redo | styleselect | bold italic | link image',--}}
            {{--menubar: false,--}}
        {{--});--}}
    {{--</script>--}}

@section('content')
    <h1>Edit image details</h1>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <div class="col-xs-12">
                <a class="col-xs-8 col-xs-offset-2" href="{{url($image->file_path . '/' . $image->file_name)}}" target="_blank">
                    <img alt="" src="{{url($image->thumbnail_path . '/' . $image->thumbnail)}}" style="width: 100%;">
                </a>
            </div>
            {!! Form::model($image, ['route' => ['image.update', $image->id], 'method' => 'PUT', 'files' => true]) !!}

            {{ Form::label('name', 'Image name:') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'maxlength' => '25')) }}

            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, array('class' => 'form-control', 'minlength' => '10', 'maxlength' => '255')) }}

            {{ Form::label('album_id', 'Album:', ['class' => 'form-spacing-top']) }}
            {{ $album->name }}

        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create at:</dt>
                    <dd>{{ date('M j, Y H:ia', strtotime($image->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last update:</dt>
                    <dd>{{ date('M j, Y H:ia', strtotime($image->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Html::linkRoute('album.show', 'Cancel', array($image->album_id), array('class' => 'btn btn-primary btn-block')) }}
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
