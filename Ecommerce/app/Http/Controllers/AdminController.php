<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{ 
    // Add user page
    public function AddUser(){
        $roles = Role::all();
        return view('users.adduser',compact('roles'));
    }

    // show users
    public function showUser(){
        try{
            $users = User::paginate(5)->except(Auth::id());
            $roles = Role::all();
        }
        catch(\Exception $exception){
            return view('users.usernotfount');
        }
        
        return view('users.showuser',compact('users','roles'));
    }

    // add user
    public function PostAddUser(Request $req){
        $validateData =$req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
            'role_id' => ['required'],
            'status' => ['required']
        ]);

        if($validateData){
            User::create([
                'firstname' => $req->firstname,
                'lastname' => $req->lastname,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'role_id' => $req->role_id,
                'status' => $req->status
            ]);
            return back()->with('success','User Registered Successfully !!');
        }
        else{
            return back()->with('error','Fail to Register User');
        }
    }

    // display edit user 
    public function EditUser($id){
        try{
            $user = User::where('id',$id)->firstorFail();
            $userrole = Role::where('role_id',$user->role_id)->firstorFail();
            $roles = Role::all();
        }catch(\Exception $exception){
            return view('users.usernotfount');
        }
        
        return view('users.edituser',compact('user','userrole','roles'));
    }

    // update user (edited)
    public function postEditUser(Request $req){
        try{         
            User::where('id',$req->id)->update([
                'firstname' => $req->firstname,
                'lastname' => $req->lastname,
                'email' => $req->email,
                'password' => Hash::make($req->password),
                'role_id' => $req->role_id,
                'status' => $req->status
            ]);
            return back()->with('success','User Updated Successfully !!');
        }catch(\Illuminate\Database\QueryException $e){
            return view('users.duplicateuser');
        }
    }

    // delete user
    public function DeleteUser(Request $req){
        User::where('id',$req->aid)->delete();
        return back();
    }
}
