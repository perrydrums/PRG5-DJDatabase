<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Genre;
use Illuminate\Http\Request;

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

        return view('artists.index', array('artists' => $artists, 'genres' => $genres));
    }
}
