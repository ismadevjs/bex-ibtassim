<?php

namespace App\Http\Controllers;
use  App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list() {
        $users = User::latest()->orderBy('id', 'DESC')->paginate(25);
        return view('admin.users.list')->with(compact('users'));
    }
    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // check if there is a user
        $user = User::where('email', $request->email)->first();
        if ($user) return back()->withErrors(['errors' => 'User already in our records']);
        

        // add user to databse
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
            'status' => 1
        ]);


        return redirect()->route('users.list')->withErrors(['errors' => 'User Added']);
    }

    public function update(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

         // check if there is a user
         $user = User::find($request->id);
         if (!$user) return back()->withErrors(['errors' => 'Somthing went wrong']);
         
 
         // add user to databse
         $user->name = $request->name;
         $user->email = $request->email;
         if($user->password != '') $user->password = Hash::make($request->password);
         $user->role = $request->role;
         $user->status = $request->status;

         $user->save();
 
 
         return redirect()->route('users.list')->withErrors(['errors' => $user->name. " Updated"]);

    }

    public function delete(Request $request) {
        $user = User::find($request->id);
        if ($user && $user->name == $request->name) {
            $user->delete();
            return back()->withErrors(['errors' => $request->name . ' Deleted']);
        } else {
            return back()->withErrors(['errors' => 'Somthing went wrong']);
        }
    }
}
