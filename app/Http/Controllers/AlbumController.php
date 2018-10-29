<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlbumController extends Controller
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
        $albums = Album::orderBy('id', 'desc')->paginate(3);

        return view('albums.index')->withAlbums($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
            'name' => 'required|min:4|max:255'
        ));

        $album = new Album();
        $album->name = $request->name;
        $album->description = $request->description?: '';
        $album->save();

        $tags = Tag::pluck('name', 'id');

        Session::flash('success', 'Sikeresen elmentetted az Albumot! Töltsd fel a képeket!');

        return view('albums.edit', compact('album', 'tags'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with('image')->find($id);
        $tags = Tag::pluck('name', 'id');
        $cover = Image::find($album->cover_id);

        return view('albums.show', compact('album', 'tags', 'cover'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::with('image')->find($id);
        $tags = Tag::pluck('name', 'id');
        $cover = Image::find($album->cover_id)? : null;

        return view('albums.edit', compact('album', 'tags', 'cover'));
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
        $album = Album::with('image')->find($id);

        if($album) {
            $storagePath = 'galleries/' . $album->id;
        }

        if($request->cover && $album) {
            if($album->cover_id) {
                if(Image::find($album->cover_id)) {
                    Image::find($album->cover_id)->delete();
                }
            }

            $coverImage = $request->file('cover');
            $coverPath = $coverImage->move($storagePath, 'cover.jpg');

            $thumb = \Intervention\Image\Facades\Image::make($coverPath->getRealPath());
            $thumb->resize(300, null, function ($constraint) {
               $constraint->aspectRatio();
            });

            if( ! \File::isDirectory($storagePath . '/thumb')) {
                \File::makeDirectory($storagePath . '/thumb', 493, true);
            }

            $thumb->save('galleries/' . $album->id . '/thumb/cover.jpg');


            $coverData = Image::create([
                'album_id' => $album->id,
                'file_name' => $coverPath->getFilename(),
                'file_path' => $coverPath->getPath(),
                'thumbnail' => $thumb->basename,
                'thumbnail_path' => $thumb->dirname,
                'cover' => true,
                'name' => '',
                'description' => '',
            ]);

            $album->cover_id = $coverData->id;
        }

        $album->name = $request->name;
        $album->description = $request->description;
        $album->update();

        if($request->input('tag_list')) {
            $this->syncTags($album, $request->input('tag_list'));
        }

        if($request->images && $album) {
            foreach ($request->images as $albumImage){

                $imagePath = $albumImage->move($storagePath, $albumImage->getClientOriginalName());

                $thumb = \Intervention\Image\Facades\Image::make($imagePath->getRealPath());
                $thumb->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                if( ! \File::isDirectory($storagePath . '/thumb')) {
                    \File::makeDirectory($storagePath . '/thumb', 493, true);
                }

                $thumb->save('galleries/' . $album->id . '/thumb/' . $albumImage->getClientOriginalName());

                Image::create([
                    'album_id' => $album->id,
                    'file_name' => $imagePath->getFilename(),
                    'file_path' => $imagePath->getPath(),
                    'thumbnail' => $thumb->basename,
                    'thumbnail_path' => $thumb->dirname,
                    'name' => '',
                    'description' => '',
                ]);
            }
        }

        Session::flash('success', 'Sikeresen módosítottad az Albumot!');

        return redirect()->route('album.show', ['id' => $album->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->tags()->detach();

        foreach($album->image as $image) {
            $image->delete();
        }

        $storagePath = 'galleries/' . $album->id;

        if($album->delete()) {
            if( \File::isDirectory($storagePath)) {
                \File::deleteDirectory($storagePath);
            }
        }

        Session::flash('success', 'Sikeresen törölted az Album-ot!');

        return redirect()->route('album.index');
    }

    /**
     * @param Album $album
     * @param array $tags
     */
    private function syncTags(Album $album, $tags)
    {
        $album->tags()->sync($tags);
    }
}
