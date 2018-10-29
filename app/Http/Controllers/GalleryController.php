<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function getList()
    {
        $albums = Album::orderBy('id', 'desc')->paginate(10);

        return view('galleries.index')->with('albums', $albums);
    }

    public function getSingle($id)
    {
        $album = Album::where('id', '=', $id)->first();

        return view('galleries.single')->with('album', $album);
    }
}
