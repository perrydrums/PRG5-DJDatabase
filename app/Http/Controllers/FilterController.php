<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Genre;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilterController extends Controller
{
    /**
     * Get the artists with a specific genre ID
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function genre(Request $request)
    {
        $artists = new Artist();
        $genres = Genre::all();
        if ($request['genre_id']) {
            $artists = $artists->where('genre', '=', $request['genre_id']);
        }

        $artists = $artists->orderBy('created_at', 'desc');
        $artists = $artists->take(5)->get();

        $meta['is_content_manager'] = null;
        $user = new User();
        if($user = $user->find(Auth::id())) {
            $meta['is_content_manager'] = $user->hasRole('content-manager');
        }

        return view('artists.index', array('artists' => $artists, 'genres' => $genres, 'meta' => $meta));
    }
}
