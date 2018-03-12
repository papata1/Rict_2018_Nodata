<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\UserRequest;
use App\Http\Requests\User1Request;
use App\Http\Requests\User2Request;
use App\User;
use App\Users;
use App\UserEdit;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('roles');
  }               
    public function index(){
      $users = DB::table('users')->get();
      return view('user.index', compact('users'));
    }
    public function create(){
    return view('/user.create');
    }
    public function store(User2Request $request)
     {

     $u = User::create([
           'name' => $request['name'],
           'email' => $request['email'],
            'role' => $request['role'],
           'password' => bcrypt($request['password']),

       ]);
        return redirect()->route('user.index')->with('message','item has been added successfully');
     }

     public function edit(user $user)
    {
        return view('user.edit',compact('user'));
    }

    public function update(User1Request $request,User $user)
   {

       $user->update($request->all());
       return redirect()->route('user.index')->with('message','item has been updated successfully');
   }

     public function destroy(user $user)
     {
        $user->delete();
        return redirect()->route('user.index')->with('message','item has been deleted successfully');
     }
}
