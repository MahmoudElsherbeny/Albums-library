<?php

namespace App\Http\Controllers;

use App\models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\models\Album_image;
use App\Traits\ImageFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ImageController extends Controller
{
    use ImageFunctions;

    public function view($id,$album_id) {
        $album = Album::WhereUser(Auth::id())->findOrFail($album_id);
        $img = $album->album_images()->findOrFail($id);
        $albums = Album::WhereUser(Auth::id())
                       ->Where('id','!=',$img->album->id)
                       ->OrderBy('name')->get();
        return view('image.view')->with(['img' => $img, 'albums' => $albums]);
    }

    public function moveTo(Request $request, $id, $album_id) {
        $album = Album::WhereUser(Auth::id())->findOrFail($album_id);
        $album_image = $album->album_images()->findOrFail($id);
        try {
            DB::beginTransaction();

                if($request->name != null) {
                    $validatedData = $request->validate([
                        'name' => [
                            'max:100',
                            Rule::unique('albums', 'name')->where(function($query) {
                                $query->where('user_id', Auth::id());
                            }),
                        ]
                    ]);

                    $new_album = Album::create([
                        'user_id' => Auth::id(),
                        'name' => $request->input('name'),
                    ]);
                    $album = $new_album->id;
                }
                else {
                    if($request->new_album > 0) {
                        $album = $request->input('new_album');
                    }
                }
                $album_image->update(['album_id' => $album]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error','Error: '.$e->getMessage());
        }  

        return Redirect::route('albums.info', ['id' => $album]);
    }

    public function destroy($id,$album_id) {
        $album = Album::WhereUser(Auth::id())->findOrFail($album_id);
        $album_image = $album->album_images()->findOrFail($id);
        try {
            DB::beginTransaction();
                $this->delete_if_exist($album_image->image);
                $album_image->delete();
                count($album->album_images) == 0 ? $album->delete() : '';
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error','Error: '.$e->getMessage());
        }  
        return count($album->album_images) == 0 
            ? Redirect::route('index')
            : Redirect::route('albums.info', ['id' => $album_image->album->id]);
    }
}
