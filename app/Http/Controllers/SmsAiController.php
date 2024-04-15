<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PhoneVerification;
use Illuminate\Support\Str;


class SmsAiController extends Controller
{
    const REQUESTED = 1;
    const PROCESSING = 2;
    const SENT = 3;
    const VERIFIED = 4;
    const FAILED = 5;
    const INVALID = 6;
   

    public function index()
    {
        return view('sms_chat_demo');
    }


    public function otpPhone(Request $request)
    {
        $otp_value = mt_rand(100000, 999999);
        $otp = new PhoneVerification();
        $otp->id = Str::uuid()->toString();
        $otp->country_code = $request->country_code;
        $otp->phone_number = $request->phone_number;
        $otp->code = $otp_value;
        $otp->expiry = (new \DateTime())->modify("+15 minutes");
        $otp->status = self::REQUESTED;
        $otp->saveOrFail();

        return response()->json($otp, 200);


    }

}