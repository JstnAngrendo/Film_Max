<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if($request->remember){
            Cookie::queue('mycookie', $request->email, 5);
        }

        if(Auth::attempt($credentials,true)){
            // Session::put('mysession', $credentials);
            return redirect('/home')->with('success-info', 'Login Successfully');
        }else{
            return redirect('/')->with('error', 'Invalid Credentials / Account not registered...');

        }
    }

    public function register(Request $request)
    {

            $user = new User(); 
            $user->name = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'Customer';
    
            $user->save();
    
            return view('login');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
