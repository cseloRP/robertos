@extends('main')

@section('title', '| Blog')

@section('content')
<div class="row">
    <div class="col-md-12">
            <h1>Categories</h1>
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
            @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-delete"></span></a>
                    </td>
                    <td>
                        {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) }}
                        {{Form::button('<span class="glyphicon glyphicon-delete"></span>', array('type' => 'submit', 'class' => 'btn btn-danger pull-right'))}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <div class="well">
            {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
            <h2>New Category</h2>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ Form::submit('Create new category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection