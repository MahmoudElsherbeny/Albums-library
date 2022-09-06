<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\StoreImageToAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Traits\ImageFunctions;
use App\models\Album;
use App\models\Album_image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AlbumController extends Controller
{
    use ImageFunctions;

    public function create() {
        return view('album.create');
    }

    public function store(StoreAlbumRequest $request) {
        try {
            DB::beginTransaction();

                $album = Album::create([
                    'user_id' => Auth::id(),
                    'name' => $request->input('name'),
                ]);

                foreach ($request->images as $key => $image) {
                    Album_image::create([
                        'album_id' => $album->id,
                        'image' => $this->store_unique_image_path(time().$album->id.$key, $image, 'albums'),
                    ]);
                } 

                Session::flash('Success','album created succefully');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error','Error: '.$e->getMessage());
        }  

        return Redirect::back();
    }

    public function edit($id) {
        $album = Album::WhereUser(Auth::id())->findOrFail($id);
        return view('album.update')->with('album', $album);
    }

    public function update(UpdateAlbumRequest $request, $id) {
        $album = Album::WhereUser(Auth::id())->findOrFail($id);
        try {
            DB::beginTransaction();

                $album->update($request->validated()); 
                Session::flash('Success','album created succefully');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error','Error: '.$e->getMessage());
        }  

        return Redirect::back();
    }

    public function destroy(Request $request, $id) {
        $album = Album::WhereUser(Auth::id())->findOrFail($id);
        try {
            DB::beginTransaction();

                if($request->new_album > 0) {
                    $album->album_images()->update(['album_id' => $request->input('new_album')]);
                }
                else {
                    foreach($album->album_images as $image) {
                        $this->delete_if_exist($image->image);
                        $image->delete();
                    }
                }
                $album->delete();

                Session::flash('Success','album deleted succefully');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error','Error: '.$e->getMessage());
        }  

        return Redirect::route('index');
    }

    public function addTo(StoreImageToAlbumRequest $request, $id) {
        $album = Album::WhereUser(Auth::id())->findOrFail($id);
        try {
            DB::beginTransaction();

                foreach ($request->images as $key => $image) {
                    Album_image::create([
                        'album_id' => $album->id,
                        'image' => $this->store_unique_image_path(time().$album->id.$key, $image, 'albums'),
                    ]);
                }

                Session::flash('Success','image added to album succefully');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error','Error: '.$e->getMessage());
        }  

        return Redirect::route('albums.info', ['id' => $album->id]);
    }
}