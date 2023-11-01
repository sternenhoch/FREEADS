<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
        User::create($user_data);
        echo 'User successfully created';
        return view ('login');
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
            echo 'User found';
        } else {
            echo 'User not found';
            }
            return view ('index');
    }
}
