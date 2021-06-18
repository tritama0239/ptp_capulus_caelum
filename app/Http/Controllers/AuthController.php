<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                $email = 'email' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('email','password');


            if(Auth::attempt($kredensil)){
                $user = Auth::user();
                if($user->substr($email, -10) == "@gmail.com"){
                    return redirect()->intended('/pegawai');
                } elseif($user->substr($email, -11) == "@si.ukdw.ac.id"){
                    return redirect()->intended('/manager');
                }
                return redirect()->intended('/');
            }
        
        return redirect()->intended('login');
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
