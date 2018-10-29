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
    <h1>Update album</h1>
    <hr>
    <div class="row">
        {!! Form::model($album, ['route' => ['album.update', $album->id], 'method' => 'PUT', 'files' => true]) !!}
        <div class="col-md-8">
            {{--{!! Form::open(array('route' => ['album.update', $album->id], 'data-parsley-validate')) !!}--}}
            {{ Form::label('name', 'Album name:') }}
            {{ Form::text('name', null, array('class' => 'form-control', 'required', 'maxlength' => '25')) }}

            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, array('class' => 'form-control', 'minlength' => '10', 'maxlength' => '255')) }}

            {{ Form::label('tag_list', 'Tags:') }}
            {{ Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) }}

            {{ Form::label('cover', 'Cover image:') }}
            {{ Form::file('cover', ['id' => 'images', 'class' => 'form-control']) }}

            <div class="row" style="padding-top: 20px">
                <div class="col-xs-12">
                    @if(isset($cover))
                        <img alt="" src="{{(url($cover->thumbnail_path . '/' . $cover->thumbnail))}}" style="width: 100%;" >
                    @else
                        Nincs borítókép beállítva
                    @endif
                </div>
            </div>

            {{ Form::label('images', 'Images:') }}
            {{ Form::file('images[]', ['id' => 'images', 'class' => 'form-control', 'multiple']) }}


            {{--{{ Form::submit('Create album', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px' )) }}--}}
            {{--{!! Form::close() !!}--}}
        </div>
        {{--<img src="http://localhost:8000/storage/galleries/8/6f80d785c291ae72e403008310a33e8d.jpeg" alt="">--}}
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create at:</dt>
                    <dd>{{ date('M j, Y H:ia', strtotime($album->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last update:</dt>
                    <dd>{{ date('M j, Y H:ia', strtotime($album->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Html::linkRoute('album.index', 'Cancel', array(), array('class' => 'btn btn-primary btn-block')) }}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
    <div class="row">
        <div class="col-md-8">
            @foreach($album->image as $image)
                <div class="col-lg-3 col-md-4 col-xs-6">
                    <a href="{{ route('image.edit', $image->id) }}" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" alt="" src="{{url(Storage::url($image->thumbnail))}}" >
                        <img class="img-fluid img-thumbnail" alt="" src="{{url($image->thumbnail_path . '/' . $image->thumbnail)}}">
                    </a>
                    {{ Form::open(['route' => ['image.destroy', $image->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
                    {{ Form::close() }}
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag'
        });
    </script>

@endsection
