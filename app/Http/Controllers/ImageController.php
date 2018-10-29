<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\File;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        $album = Album::find($image->album_id);

        return view('images.edit', compact('image', 'album'));
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
        $image = Image::find($id);
        $image->name = $request->name;
        $image->description = $request->description;

        $image->update();

        Session::flash('success', 'Sikeresen módosítottad a Kép adatait!');
        return redirect()->route('album.show', ['id' => $image->album_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);

        $albumId = $image->album_id;

        $image->delete();

        Session::flash('success', 'Sikeresen törölted a képet!');

        return redirect()->route('album.show', ['id' => $albumId]);
    }
}
