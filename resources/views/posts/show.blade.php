@extends('main')

@section('title', '| Show post')

@section('content')
   <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <p class="lead"> {!! $post->body !!} </p>
        </div>
       <div class="col-md-4">
           <div class="well">
               <dl class="dl-horizontal">
                   <label>Url:</label>
                   <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug)}}</a></p>
               </dl>
               <dl class="dl-horizontal">
                    <label>Category:</label>
                   <p>Posted In: {{ ($post->category)?$post->category->name:'Nincs kategória kiválasztva' }}</p>
               </dl>
               <dl class="dl-horizontal">
                   <label>Connected album:</label>
                   <p>{{ ($post->album)?$post->album->name:'Nincs kategória kiválasztva' }}</p>
               </dl>
               <dl class="dl-horizontal">
                   <label>Tags:</label>
                   @if(!$post->tags->isEmpty())
                   <ul>
                   @foreach($post->tags as $tag)
                    <li> {{ $tag->name }} </li>
                   @endforeach
                   </ul>
                   @else
                   <p>Nincs tag beállítva</p>
                   @endif
               </dl>
               <dl class="dl-horizontal">
                    <label>Create at:</label>
                    <p>{{ date('M j, Y H:ia', strtotime($post->created_at)) }}</p>
               </dl>
               <dl class="dl-horizontal">
                    <label>Last update:</label>
                    <p>{{ date('M j, Y H:ia', strtotime($post->updated_at)) }}</p>
               </dl>
               <hr>
               <div class="row">
                   <div class="col-sm-6">
                       {{ Html::linkRoute('post.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) }}
                   </div>
                   <div class="col-sm-6">
                       {{ Form::open(['route' => ['post.destroy', $post->id], 'method' => 'DELETE']) }}
                       {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
                       {{ Form::close() }}
                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-8">
           <div class="row">
               <label>Borítókép:</label>
               <div class="col-xs-12">
                   {{--@if($cover)--}}
                       {{--<img alt="" src="{{(url($cover->thumbnail_path . '/' . $cover->thumbnail))}}" style="width: 100%;" >--}}
                   {{--@else--}}
                       {{--Nincs borítókép beállítva--}}
                   {{--@endif--}}
               </div>
           </div>
           <div class="row">
               <label>Album képek:</label>
               @foreach($post->album->image as $image)
                   <div class="col-lg-3 col-md-4 col-xs-6">
                       <a class="d-block mb-4 h-100" href="{{url($image->file_path . '/' . $image->file_name)}}" target="_blank">
                           <img class="img-fluid img-thumbnail" alt="" src="{{url($image->thumbnail_path . '/' . $image->thumbnail)}}">
                       </a>
                   </div>
               @endforeach

           </div>
       </div>
   </div>
@endsection