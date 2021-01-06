<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function showLogin()
    {
        if(Auth::check())
            return redirect("/");

        return view("user.login",["code"=>0]);
    }

    public function showRegister()
    {
        if(Auth::check())
            return redirect("/");
        return view("user.register",["code"=>0]);
    }

    public function showProfile()
    {
        if(!Auth::check())
            return redirect("/");
        return view("user.profile",["code"=>0]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials,$remember = true))
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return view("user.login",["code"=>400]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

    public function register(Request $request)
    {
        if (empty($request->name) || empty($request->email) || empty($request->password))
        {
            return view("user.register",["code"=>400]);
        }

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->remember_token="";

        $user->save();

        return view("user.register",["code"=>200]);
    }

    public function update(User $user,Request $request)
    {
        if (empty($request->name) || empty($request->email) || empty($request->password))
        {
            return view("user.profile",["code"=>400]);
        }

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);

        $user->save();

        return view("user.profile",["code"=>200]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect("/logout");
    }
}
