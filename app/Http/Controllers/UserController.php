<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userRegister(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    // Create a new admin
    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));

    // Save the admin to the database
    $user->save();

    // You can add any additional logic here, like sending a welcome email, etc.

    return response()->json(['message' => 'User registered successfully'], 201);
}

public function userLogin(Request $request){
    $request->validate([
        'email'=>'required',
        'password'=>'required',
    ]);

    if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password])){
        return redirect('/dashboard')->with('success', 'Login Successfully!');
    }else{
        // Session::flash('error-msg','Invalid Email or Password');
        return redirect()->back()->with('error', 'Login Failed!');
    }
}

public function userDashboard(){
    return view('dashboard');
}

public function userLogout(){
    Auth::guard('web')->logout();
    return redirect('/login');
}

}
