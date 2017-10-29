<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Check if permissions are being set and set those
     * A higher role always has the lower roles too
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function permissions(Request $request)
    {
        $user = new User;
        $user = $user->find($request['user_id']);
        $user->roles()->detach();

        // A higher role also has the lower roles
        if ($request['user']) {
            $this->setRole($user, 'user');
        }
        if ($request['content-manager']) {
            $this->setRole($user, 'user');
            $this->setRole($user, 'content-manager');
        }
        if ($request['admin']) {
            $this->setRole($user, 'user');
            $this->setRole($user, 'content-manager');
            $this->setRole($user, 'admin');
        }
        return redirect()->back();
    }

    /**
     * Find a role and attach it to the user
     *
     * @param User $user
     * @param string $role_name
     */
    private function setRole(User $user, $role_name)
    {
        $role = new Role;
        $role = $role->where('name', '=', $role_name)->get();
        $user->roles()->attach($role);
    }
}
