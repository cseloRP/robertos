@extends('main')

@section('title', '| Blog')

@section('content')
<div class="row">
    <div class="col-md-12">
            <h1>Blog</h1>
    </div>
</div>

@foreach($posts as $post)
    <div class="row">
        <h3>{{ $post->title }}</h3>
        <div class="col-md-4">
        @if($post->album)
            <img src="{{ url($post->album->getAlbumCoverPath()['thumbnailPath']) }}" />
        @endif
        </div>
        <div class="col-md-6">
            <a href="{{ url('blog/' . $post->slug) }}#disqus_thread"></a>
            <p>{{ substr(strip_tags($post->body), 0, 300)}}{{ strlen(strip_tags($post->body)) > 300 ? '...' : '' }}</p>
            <a href="{{ url('blog/' . $post->slug) }}" class="btn btn-default btn-sm">Read more</a>
        </div>
    </div>
    <hr>
@endforeach
@endsection