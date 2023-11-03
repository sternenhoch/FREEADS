<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');
    }

    public function signup (){
        return view ('signup');
    }

    public function login (){
        return view ('login');
    }
    public function register (Request $request){
        //dump($request);
        $user_data = $request->validate([
            'login' =>['required', 'min:5', 'max:20'],
            'email' =>['required', 'email', Rule::unique('users', 'email')],
            'password' =>['required', 'min:5', 'max:20', 'confirmed'],
            'phone_number' =>'required'
        ]);

        $user_data['password'] = bcrypt($user_data['password']);
        //automating login after registration
        $user = User::create($user_data);
        auth()->login($user);
        //event(new Registered($user));
        //return redirect()->route('verification.notice');
        return redirect('/')->with('success', 'Thank you for ' . Auth::user()->login . ' creating your account.');

    }

    public function signin (Request $request) {
        //dump($request);
        $user_data = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['login' => $user_data['loginusername'], 
        'password' => $user_data['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Welcome ' . Auth::user()->login . ' You are now logged in.');
        } else {
            //echo 'User not found';
            }
            return redirect('/');
    }

}
