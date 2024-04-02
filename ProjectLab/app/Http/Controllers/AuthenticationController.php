<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class AuthenticationController extends Controller
{
    //
    public function login(Request $request){
        $credentials = (['email' => $request->email, 'password' => $request->password]);

        //remember with token
        if(!Auth::attempt($credentials, $request->remember_me)){
            return redirect()->back()->withErrors(new MessageBag(['Your
            username or password is incorrect']));
        }

        return redirect('/');

    }

    public function register(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'min:5','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string', 'min:1'],
            'DOB' => ['required', 'date','before:today'],
            'country' => ['required', 'string']
        ]);
        $data = $request->all();
        $check = $this->create($data);

        return redirect('/');
    }

    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender'=>$data['gender'],
            'DOB'=>$data['DOB'],
            'country'=>$data['country'],
        ]);
    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

