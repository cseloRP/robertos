<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Cache\TagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $albums = Album::pluck('name', 'id');


        return view('posts.create', compact('categories', 'tags', 'albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'category_id' => 'required|integer',
            'album_id' => 'integer|nullable',
            'body' => 'required'
        ));

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->album_id = $request->album_id;
        $post->body = Purifier::clean($request->body);

        $post->save();
        $this->syncTags($post, $request->input('tags'));

        Session::flash('success', 'Sikeresen elmentetted a Post-ot!');

        return redirect()->route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $albums = Album::pluck('name', 'id');

        return view('posts.edit', compact('post', 'categories', 'tags', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $post = Post::find($id);

        $this->validate($request, array(
            'title' => 'required|max:255',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));

        if($request->input('slug') != $post->slug){
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required|integer',
                'album_id' => 'integer|nullable',
                'tag_list' => 'required|integer',
                'body' => 'required'
            ));
        }

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->album_id = $request->input('album_id');
        $post->body = Purifier::clean($request->input('body'));

        $post->update();
        $this->syncTags($post, $request->input('tag_list'));

        Session::flash('success', 'Sikeresen módosítottad a Post-ot!');

        return redirect()->route('post.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();

        $post->delete();

        Session::flash('success', 'Sikeresen törölted a Post-ot!');

        return redirect()->route('post.index');
    }

    /**
     * @param Post $post
     * @param array $tags
     */
    private function syncTags(Post $post, $tags)
    {
        $post->tags()->sync($tags);
    }
}
