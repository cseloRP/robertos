@extends('main')

@section('title', '| Edit post')

@section('stylesheets')

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link',
            toolbar: 'undo redo | styleselect | bold italic | link image',
            menubar: false,
        });
    </script>

@section('content')
    <h1>Create new post</h1>
    <hr>
    <div class="row">
        {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}

            {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, ['class' => 'form-control']) }}

            {{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('album_id', 'Album:', ['class' => 'form-spacing-top']) }}
            {{ Form::select('album_id', $albums, null, ['class' => 'form-control']) }}

            {{ Form::label('tag_list', 'Tags:') }}
            {{ Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) }}

            {{ Form::label('body', 'Content:', ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Create at:</dt>
                    <dd>{{ date('M j, Y H:ia', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last update:</dt>
                    <dd>{{ date('M j, Y H:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Html::linkRoute('post.show', 'Cancel', array($post->id), array('class' => 'btn btn-primary btn-block')) }}
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

@section('scripts')

    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag'
        });
    </script>

@endsection