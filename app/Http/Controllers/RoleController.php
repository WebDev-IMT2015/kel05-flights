<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $permissions=Permission::all();
       	return view('role/create')->with('permissions', $permissions);
    }

    public function store(Request $request)
    {
        $role=Role::create($request->except(['permission','_token']));

        foreach ($request->permission as $key=>$value){
            $role->attachPermission($value);
        }

        $permissions=Permission::all();

        return redirect('role')->with('permissions', $permissions)->withMessage('role created');

    }
}
