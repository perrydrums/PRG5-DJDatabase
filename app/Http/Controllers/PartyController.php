<?php

namespace App\Http\Controllers;

use App\Party;
use App\PartyComment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $parties = $parties->orderBy('updated_at', 'desc')->get();
        $meta['is_content_manager'] = null;
        $user = new User();
        if($user = $user->find(Auth::id())) {
            $meta['is_content_manager'] = $user->hasRole('content-manager');
        }

        return view('parties.index', array('parties' => $parties, 'meta' => $meta));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parties = new Party;
        $party  = $parties->find($id);

        $comments = new PartyComment();

        $party['comments'] = $comments
            ->where('resource_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('parties.show', array('party' => $party));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parties = new Party;
        $party  = $parties->find($id);
        return view('parties.edit', array('party' => $party));
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
        $party = new Party;
        $party = $party->find($id);

        $request->validate([
            'name'          => 'required|max:45',
            'organizer'     => 'required|max:45',
            'location'      => 'required|max:80',
            'date'          => 'required|date',
            'time'          => 'required',
            'picture'       => 'max:150',
        ]);

        $party->update($request->all());

        return redirect()->route('parties.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $party = new Party;
        $party = $party->find($id);
        $party->delete();

        return redirect()->route('parties.index');
    }
}
