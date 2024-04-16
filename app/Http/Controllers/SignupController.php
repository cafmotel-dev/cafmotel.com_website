<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\PhoneVerification;
use App\Models\EmailVerification;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Log;

class SignupController extends Controller
{
    public function index(){

        return view('register');
        
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);
    
        try {
            // Insert the data into the 'users' table using the DB facade
          $data=  DB::table('users')->insert([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']), // Hash the password for security
                'created_at' => now(), // Optionally, set the created_at timestamp
                'updated_at' => now(), // Optionally, set the updated_at timestamp
            ]);
            // Redirect the user to a success page or return a response
            return redirect()->route('signup')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the insertion
            return back()->withInput()->withErrors(['error' => 'Failed to create account. Please try again.']);
        }
    }
   public function store_old(Request $request)
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
    public function verifyCode_old()
    {
        $user = DB::table('users')->orderBy('id', 'desc')->first();
        $userId=$user->id;

        return view('verifyCode',compact('userId'));
        
    }
  public function StoreVerifyCode_old(Request $request)
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


public function resendCode_old($userId)
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
public function SendMobileOtp_old(Request $request)
{
    // Generate a random OTP (you can customize the length and characters as needed)
    $otp = mt_rand(100000, 999999);

    // Send the OTP via SMS using a service like Twilio, Nexmo, or an SMS gateway API
    $recipientNumber = $request->phone; // Replace this with the recipient's actual phone number
    $message = "Your OTP for verification is: $otp"; // Message format for OTP

    // Send the SMS using a SMS gateway API or service
    // $smsSent = $this->sendSms($recipientNumber, $message);

    if ($otp) {
        // Store the OTP in the database for verification later
        // Assuming you have a table named 'otp_codes' with columns 'phone_number' and 'otp_code'
        $data = [
            'phone_number' => $recipientNumber,
            'otp' => $otp,
            'created_at' => now(), // Use Laravel's Carbon or PHP's date functions to get the current time
        ];

        // Assuming you have an Eloquent model named 'OtpCode'
        OtpCode::create($data);

        // Return a success response or redirect to a verification page
        return response()->json(['success' => true, 'message' => 'OTP sent successfully']);
    } else {
        // Return an error response if SMS sending fails
        return response()->json(['success' => false, 'message' => 'Failed to send OTP']);
    }
}

// // Example function to send SMS using a hypothetical SMS gateway API
// private function sendSms($recipientNumber, $message)
// {
//     // Code to send SMS using an SMS gateway API
//     // Replace this with the actual implementation for sending SMS
//     // Example: using Twilio API, Nexmo API, or any other SMS gateway service
//     // Return true if SMS is sent successfully, false otherwise
//     return true; // Placeholder for SMS sending success
// }
public function verifyCode(Request $request)
{
    // return $request->all();
    // Retrieve verification code and ID from the request
    $code = $request->input('otp');
    $id = $request->input('uuid');

    // Query the phone_verification table
    $verification = PhoneVerification::where('id', $id)
                                    ->where('code', $code)
                                    ->first();
Log::info('reached',['verification',$verification]);
    if ($verification) {
        // Verification successful
        return response()->json(['message' => 'Verification successful'], 200);
    } else {
        // Verification failed
        return response()->json(['message' => 'Verification code is incorrect'], 422);
    }
}
public function otpEmail(Request $request)
{
    $otp_value = mt_rand(100000, 999999);
    $email=$request->email;
    $otp = new EmailVerification();
    $otp->id = Str::uuid()->toString();
    $otp->email = $request->email;
    $otp->code = $otp_value;
    $otp->expiry = (new \DateTime())->modify("+15 minutes");
    $otp->status = 1;
    $otp->saveOrFail();
    Mail::send([], [], function ($message) use ($email,$otp_value) {
        $message->to($email)
            ->subject(' Verification Code')
            ->setBody('Your  verification code is: ' . $otp_value);
    });

    return response()->json($otp, 200);


}
public function verifyCodeEmail(Request $request)
{
    // return $request->all();
    // Retrieve verification code and ID from the request
    $code = $request->input('otp');
    $id = $request->input('uuid');

    // Query the phone_verification table
    $verification = EmailVerification::where('id', $id)
                                    ->where('code', $code)
                                    ->first();
Log::info('reached',['verification',$verification]);
    if ($verification) {
        // Verification successful
        return response()->json(['message' => 'Verification successful'], 200);
    } else {
        // Verification failed
        return response()->json(['message' => 'Verification code is incorrect'], 422);
    }
}
}
