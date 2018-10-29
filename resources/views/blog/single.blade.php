@extends('main')

@section('title', "| $post->title")

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img class="img-fluid" style="width:100%" src="{{ url($post->album->getAlbumCoverPath()['thumbnailPath']) }}" />
            <span class="disqus-comment-count" data-disqus-identifier="{{ $post->id }}"> <!-- Count will be inserted here --> </span>
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{ ($post->category)?$post->category->name:'Nincs kategória kiválasztva' }}</p>
            <p>Connected gallery: {{ ($post->album)?$post->album->name:'Nincs galéria kiválasztva' }}</p>
            <p>Tags:</p>
            @if(!$post->tags->isEmpty())
                <ul>
                    @foreach($post->tags as $tag)
                        <li> {{ $tag->name }} </li>
                    @endforeach
                </ul>
            @else
                <p>Nincs tag beállítva</p>
            @endif
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div id="disqus_thread"></div>
            <script>
                 var disqus_config = function () {
                  //  this.page.url = '<?php echo $post->slug; ?>'; // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = '<?php echo $post->id; ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                 };
                (function() {
                    var d = document, s = d.createElement('script');
                    s.src = 'https://rpscms.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
    </div>
@endsection