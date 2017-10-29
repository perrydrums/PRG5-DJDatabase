<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Check for permission
     */
    public function __construct()
    {
        // Minimal role: user (logged in)
        $this->middleware('roles:user');
    }

    /**
     * Show the profile page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = new User;
        $current_user = $current_user->find(Auth::id());
        $meta['is_admin'] = $current_user->hasRole('admin');

        $users = null;
        if ($meta['is_admin']) {
            $users = User::all();
        }

        return view('user.profile', array('c_user' => $current_user, 'users' => $users, 'meta' => $meta));
    }
}