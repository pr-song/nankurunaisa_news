<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRoleFormRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('manager.users.index', compact('users'));
    }
    
    public function edit_user_role($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles()->pluck('name')->toArray();
        return view('manager.users.edit_user_role', compact('user', 'roles', 'selectedRoles'));
    }

    public function update_user_role(EditUserRoleFormRequest $request, $id)
    {
        $user = User::whereId($id)->firstOrFail();
        $user->syncRoles($request->get('role'));

        return redirect(route('manager.edit_user_role', $user->id))->with('status', 'Role of user has been updated!');
    }
}
