<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class SignupController extends Controller
{
    public function index(){

        return view('signup');
        
    }

   public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $fullPhoneNumber = $request->input('country_code') . $phone;
        $password = bcrypt($request->input('password')); // Hash the password

        try {
            // Generate verification code
            $verificationCode = rand(100000, 999999); // You can adjust the range as needed

            // Insert user data and verification code into the database
            $userId = DB::table('users')->insertGetId([
                'name' => $name,
                'email' => $email,
                'phone' => $fullPhoneNumber,
                'password' => $password,
                'verification_code' => $verificationCode,
                'verification_time' => Carbon::now(),
            ]);


            // Send verification code via email
        Mail::send([], [], function ($message) use ($email, $name, $verificationCode) {
            $message->to($email)
                ->subject('Verification Code')
                ->setBody('Your verification code is: ' . $verificationCode . '. This code is valid only for 2 minutes.');
        });

        // Set success message
        // $message = 'Verification code sent successfully. Please check your email for the verification code.';
        session()->flash('success', 'Verification code sent successfully. Please check your email for the verification code.');


            return redirect()->route('verifyCode');
        } catch (Exception $e) {
            session()->flash('error', 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);

            return redirect()->route('verifyCode');
        }
    }
    public function verifyCode()
    {
        $user = DB::table('users')->orderBy('id', 'desc')->first();
        $userId=$user->id;

        return view('verifyCode',compact('userId'));
        
    }
  public function StoreVerifyCode(Request $request)
{
    $request->validate([
        'code' => 'required|digits:6', // Assuming 6-digit verification code
    ]);

    $code = $request->input('code');

    $user = DB::table('users')->orderBy('id', 'desc')->first();
    // $time=Carbon::now();
    // return $time;
    //  $code=Carbon::parse($user->verification_time)->diffInSeconds(Carbon::now());
    // return $code;
    if ($user && $user->verification_code == $code && Carbon::parse($user->verification_time)->diffInSeconds(Carbon::now()) <= 600) {
        // Update the verification code and time directly in the database
        $a=DB::table('users')
            ->where('id', $user->id)
            ->update([
                'verification_code' => null,
                'verification_time' => null,
            ]);

        // Set success flash message
        
        session()->flash('success', 'Verification successful. Your account is now verified.');

        return redirect()->route('login');
    } else {
        // Set error flash message
        session()->flash('error', 'Invalid or expired verification code.');

        return back();
    }
}


public function resendCode($userId)
{
    // Get the user by ID
    $user = User::find($userId);
    $email=$user->email;
    $name=$user->name;
    if (!$user) {
        // Handle if user does not exist
        return redirect()->back()->with('error', 'User not found.');
    }

    try {
        // Generate new verification code
        $newVerificationCode = rand(100000, 999999); // You can adjust the range as needed

        // Update user data in the database
        $user->verification_code = $newVerificationCode;
        $user->verification_time = Carbon::now();
        $user->save();

        Mail::send([], [], function ($message) use ($email, $name, $newVerificationCode) {
            $message->to($email)
                ->subject('New Verification Code')
                ->setBody('Your New verification code is: ' . $newVerificationCode);
        });
        // Set success message
        session()->flash('success', 'New verification code sent successfully. Please check your email for the new verification code.');

        
        return redirect()->route('verifyCode');
    } catch (Exception $e) {
        // Handle PHPMailer exception
        session()->flash('error', 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);

        
        return redirect()->route('verifyCode');
    }
}
}
