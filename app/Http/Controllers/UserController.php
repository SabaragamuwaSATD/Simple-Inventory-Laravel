<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Note: Login function////////////////////////////////////////////////////////////////////////////

    public function Login(Request $request){
        $incomingFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(auth()->attempt(['email'=>$incomingFields['email'], 'password'=> $incomingFields['password']])){
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    //Note: Logout function///////////////////////////////////////////////////////////////////////////////////    

    public function Logout(){
        auth()->logout();
        return redirect('/');
    }

    //Note: Register function////////////////////////////////////////////////////////////////////////////////    

    public function Register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:20'],
            'cpassword' => ['required', 'same:password'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/login');

        return 'Hello from our controller';
    }
}
