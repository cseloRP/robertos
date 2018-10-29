@extends('main')

@section('title', '| Galleries')

@section('content')
<div class="row">
    <div class="col-md-12">
            <h1>Galleries</h1>
    </div>
</div>

<div class="album text-muted">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row text-center text-lg-left">
                @foreach($albums as $album)
                    <div class="col-lg-5 col-md-4 col-xs-6">
                        <a href="{{ url('gallery/' . $album->id) }}" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="{{url($album->getAlbumCoverPath()['thumbnailPath'])}}" alt="">
                            <h3>{{ $album->name }}</h3>
                        </a>
                    </div>
                @endforeach
                </div>
                <hr>
            </div>
    </div>
@endsection