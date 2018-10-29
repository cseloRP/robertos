@extends('main')

@section('title', "| $album->name")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <span class="disqus-comment-count" data-disqus-identifier="{{ $album->id }}"> <!-- Count will be inserted here --> </span>
            <h1>{{ $album->name }}</h1>
            <hr>
            @if(!$album->image->isEmpty())
                    @foreach($album->image as $image)
                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <a href="{{url($image->file_path . '/' . $image->file_name)}}">
                                <img class="img-fluid img-thumbnail" alt="" src="{{url($image->thumbnail_path . '/' . $image->thumbnail)}}">
                            </a>
                        </div>
                    @endforeach
            @else
                <p>Az album még nem tartalmaz képeket</p>
            @endif
        </div>
        <div class="col-md-8 col-md-offset-2">
            <p>Tags:</p>
            @if(!$album->tags->isEmpty())
                <ul>
                    @foreach($album->tags as $tag)
                        <li> {{ $tag->name }} </li>
                    @endforeach
                </ul>
            @else
                <p>Nincs tag beállítva</p>
            @endif
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div id="disqus_thread"></div>

            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
    </div>
@endsection