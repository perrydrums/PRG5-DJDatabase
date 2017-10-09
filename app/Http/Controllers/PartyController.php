<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
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
        $parties = new Party;
        $parties = $parties->orderBy('updated_at', 'desc')->take(5)->get();
        return view('parties.index', array('parties' => $parties));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parties.create');
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
            'name'          => 'required|max:45',
            'organizer'     => 'required|max:45',
            'location'      => 'required|max:80',
            'date'          => 'required|date',
            'time'          => 'required',
            'picture'       => 'max:150',
        ]);

        $party = new Party;
        $party = $party->create($request->all());

        return redirect()->route('parties.show', $party->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parties = new Party;
        $party  = $parties->find($id);
        return view('parties.show', array('party' => $party));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function edit(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        //
    }
}
