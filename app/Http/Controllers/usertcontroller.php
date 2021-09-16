<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usertcontroller extends Controller
{
    public function login(Request $request)
    {
        $user = new User();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return 'record not found';
        } else {
            session()->put('user', $user);

            return redirect('/');
        }
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();
        session()->put('user', $user);

        return redirect('/');
    }

    public function reg()
    {
        return view('auth/login');
    }
}
