<?php

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    /**
     * Return the access error view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function access()
    {
        return view('error.access');
    }

    /**
     * Return the not-logged-in error view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('error.login');
    }
}
