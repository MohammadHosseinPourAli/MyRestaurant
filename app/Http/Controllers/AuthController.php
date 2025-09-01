<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{

    public function login(){
        return view('authentication.login');
    }
    public function loginStore(Request $request)
    {
        $logUser = User::where('phone', $request->input('phone'))->first();
        echo '*';
        if ($logUser && Hash::check($request->input('pass'), $logUser->password)) {
            FacadesAuth::login($logUser);
            return redirect()->intended('/');
        }
    }
    public function register(){
        return view('authentication.register');
    }
    public function registerStore(Request $request){
        $newUser = $request->validate(['name' => 'required|string|max:50', 'phone' => 'required|string|unique:users|numeric', 'pass' => 'required|string|min:8', 'address' => 'required|string']);
        if ($newUser['pass'] === $request->input('conPass')){
            $newUser['pass'] = bcrypt($newUser['pass']);
            $user = new User();
            $user->name = $newUser['name'];
            $user->phone = $newUser['phone'];
            $user->address = $newUser['address'];
            $user->password = $newUser['pass'];
            $user->role = 'customer';
            $user->save();
            return redirect()->intended('/');
        }
        return back()->withErrors(['something went wrong']);
    }
}
