<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use App\Photo;
use DB;
use Auth;

class UsersController extends Controller
{


    public function index()
    {
        $users= User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view ('users.edit', compact('user','roles','userRole'));
    }


    public function update(Request $request, $id)
    {

        $user = User::findorFail($id);

        if(trim($request->password) == '')
        {
            $input = $request->except('password');
        }

        else
        {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($path = $request->file('photo_id')){
            $name = time() . $path->getClientOriginalName();
            $path->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->photo_id){
            unlink(public_path(). $user->photo->path);
        };
        $user->delete();
        return redirect()->back();
    }
}
