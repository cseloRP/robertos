<?php

namespace App\Http\Controllers;

use App\Album;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Traits\reCaptchaTrait;

class pagesController extends Controller{

    use reCaptchaTrait;

    public function getIndex(){

        $posts = [];
        $albums = [];
        if(Auth::check()) {
            $posts = Post::orderBy('id', 'desc')->paginate(5);
            $albums = Album::orderBy('id', 'desc')->limit(3);
        }
        return view('pages.welcome', compact('posts', 'albums'));
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getPrivacy(){
        return view('pages.privacyPolicy');
    }
}