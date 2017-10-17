<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the profile page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile', array('user' => Auth::user()));
    }
}