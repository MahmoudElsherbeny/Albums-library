<?php

namespace App\Http\Controllers;

use App\models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function album_info($id) {
        $album = Album::WhereUser(Auth::id())->findOrFail($id);
        $albums = Album::whereUser(Auth::id())
                       ->Where('id','!=',$id)
                       ->OrderBy('name')->get();

        return view('album.info')->with(['album' => $album, 'albums' => $albums]);
    }
}
