<?php

namespace App\Http\Controllers;

use App\Artist;
use App\ArtistComment;
use App\PartyComment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $resource_id)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $comment = null;
        $redirect = null;

        switch ($request['resource_type']) {
            case 'artist':
                $comment = new ArtistComment;
                $redirect = redirect()->route('artists.show', $resource_id);
                break;
            case 'party':
                $comment = new PartyComment;
                $redirect = redirect()->route('parties.show', $resource_id);
                break;
            default:
                return NULL;
                break;
        }

        $comment['message'] = $request['message'];
        $comment['resource_id'] = $resource_id;
        $comment['user_id'] = Auth::id();

        $comment->save();

        return $redirect;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
