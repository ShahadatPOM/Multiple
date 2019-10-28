<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check']);
    }

    public function index()
    {
        $roles = Role::all();
        return view('role.listRole', compact('roles'));
    }

    public function roleCreateForm()
    {
        return view('role.createRole');
    }

    public function roleCreate(Request $request)
    {
        $this->validate($request, [
           'name' => 'required'
        ]);
        $roleCreate = Role::create($request->all());
        $roleCreate->save();
        return redirect('role/list');
    }

    public function roleEdit($id)
    {
        $editRoles = Role::find($id);
        return view('role.editRole', compact('editRoles'));
    }

    public function roleUpdate(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required',
        ]);
        $roleUpdate = Role::find($id);
        $roleUpdate->name = $request->name;
        $roleUpdate->save();
        return redirect('role/list');
    }

    public function roleDelete($id)
    {
        Role::find($id)->delete();
        return redirect('role/list');
    }
}
