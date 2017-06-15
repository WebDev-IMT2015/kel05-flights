<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        $allRoles=Role::all();
        return view('user.list',compact(['users','allRoles']));
    }

    public function edit($id)
    {
    	$role;
        $user_edit = User::find($id);
        foreach($user_edit->roles as $role){
        	$role=$role->name;
        }
                        

        return view('user.edit')->with('user_edit', $user_edit)->with('role', $role);
    }

    public function update(Request $request)
	{
	    $id_user = $request->input('id');
        $user = User::find($id_user); 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $role = $request->input("member");

        if( ! $request->input('password') == '')
	    {
	        $user->password = bcrypt($request->input('password'));
	    }
        $user->save();

        DB::table('role_user')->where('user_id',$id_user)->delete();

        if($role =="admin"){
            $user->attachRole(Role::where('name','admin')->first());
        }
        else{
            $user->attachRole(Role::where('name','costumer-service')->first());
        }



        return redirect('home');
	}

	public function destroy($id)
    {
        $user = User::findOrFail($id);

        DB::table('role_user')->where('user_id',$id)->delete();

        $user->delete();

        return redirect('home');
    }
}
