<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArtistController extends Controller
{
    /**
     * Check for permission
     */
    public function __construct()
    {
        // Minimal role: content-manager. Exclude the index and show pages.
        $this->middleware('roles:content-manager', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = new Artist;
        $artists = $artists->orderBy('created_at', 'desc')->take(5)->get();
        return view('artists.index', array('artists' => $artists));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|unique:artists|max:45',
            'firstname'     => 'required|max:45',
            'lastname'      => 'required|max:45',
            'alias'         => 'max:45',
            'website'       => 'max:80',
            'spotify'       => 'max:80',
            'soundcloud'    => 'max:80',
            'picture'       => 'max:150',
        ]);

        $artist = new Artist;
        $artist = $artist->create($request->all());

        return redirect()->route('artists.show', $artist->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artists = new Artist;
        $artist  = $artists->find($id);
        return view('artists.show', array('artist' => $artist));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artists = new Artist;
        $artist  = $artists->find($id);
        return view('artists.edit', array('artist' => $artist));
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
        $artist = new Artist;
        $artist = $artist->find($id);

        $request->validate([
            'name'          => 'required|max:45|unique:artists,name,' . $artist->id,
            'firstname'     => 'required|max:45',
            'lastname'      => 'required|max:45',
            'alias'         => 'max:45',
            'website'       => 'max:80',
            'spotify'       => 'max:80',
            'soundcloud'    => 'max:80',
            'picture'       => 'max:150',
        ]);

        $artist->update($request->all());

        return redirect()->route('artists.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = new Artist;
        $artist = $artist->find($id);
        $artist->delete();

        return redirect()->route('artists.index');
    }
}
