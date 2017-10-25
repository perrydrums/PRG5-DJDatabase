<?php

namespace App\Http\Controllers;

use App\ArtistComment;
use App\PartyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
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
}
