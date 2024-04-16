<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    public function index(){

        return view('login');
        
    }

    public function authenticate1(Request $request)
    {
        // Validate form data
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $name = $request->input('username');
        $password = $request->input('password');

        // Query to check if the user exists in the database
        $user = DB::table('users')->where('name', $name)->where('password', $password)->first();
        if ($user) {
            // User exists, redirect to index page
            session()->flash('success', 'valid username or password.');
            return back();
        } else {
            // User not found or incorrect credentials
            session()->flash('error', 'Invalid username or password.');
            // Redirect back to login page with error message
            return back();
        }
    } 
    
    public function authenticate(Request $request)
    {
        // return $request->all();
        // Validate form data
        $request->validate([
            'username' => 'required|email',
            'password' => ['required', Password::min(6)],
        ]);
    
        $name = $request->input('username');
        $password = $request->input('password');
        
        // Query to check if the user exists in the database
        $user = DB::table('users')->where('email', $name)->first();
        //return $user;
        // $password=Hash::check($password, $user->password);
        Log::info('reched',['password'=>$password]);
        if ($user) {
            // User exists, verify the password
            if (Hash::check($password, $user->password)) {
                // Password is correct, log in the user
                session()->flash('success', 'Login successful.');
                return redirect('/');
            } else {
                // Incorrect password
                session()->flash('error', 'Invalid username or password.');
                return back();
            }
        } else {
            // User not found
            session()->flash('error', 'Invalid username or password.');
            return back();
        }
    }
    
    
}
