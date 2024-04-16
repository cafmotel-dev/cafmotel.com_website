<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PhoneVerification;
use Illuminate\Support\Str;
use App\Models\User;

class SmsAiController extends Controller {
    const REQUESTED = 1;
    const PROCESSING = 2;
    const SENT = 3;
    const VERIFIED = 4;
    const FAILED = 5;
    const INVALID = 6;
    const EXPIRED = 7;


    public function index() {
        return view('sms_chat_demo');
    }

    public function phonePersonalDetails(Request $request) {
        $verified = User::where('phone',$request->phone_number)->get()->first();
        if($verified) {
            $verified->name = $request->name;
            $verified->email = $request->email;
            $verified->phone = $request->phone_number;
            $verified->saveOrFail();
            return response()->json($verified, 200);
        }

        $password = bcrypt($request->input('password')); // Hash the password
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone_number;
        $user->password = $password;
        $user->saveOrFail();
        return response()->json($user, 200);
    }

    public function otpPhone(Request $request) {
        $verified = PhoneVerification::where('phone_number',$request->phone_number)->where('status',4)->get()->first();
        if($verified)
        if($verified->status == 4) {
            return response()->json($verified, 200);
        }

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

    public function otpPhoneVerify(Request $request) {

        $this->validate($request, ["otpId" => "required|uuid","code" => "required|digits:6"]);
        $otp = PhoneVerification::findOrFail($request->otpId);

        #Should be within expiry time
        if (time() > strtotime($otp->expiry)) {
            //return [false, "Expired"];
            $otp->status = self::EXPIRED;
            $otp->saveOrFail();
            return response()->json($otp, 200);

        }
        
        if ($otp->status === self::VERIFIED) {
            //return [false, "Already verified"];
            return response()->json($otp, 200);

        }

        if ($otp->code == $request->code) {
            $otp->status = self::VERIFIED;
            $otp->saveOrFail();
            return response()->json($otp, 200);
        }

        #if otp was not marked verified, mark it now as failed
        $otp->status = self::FAILED;
        $otp->saveOrFail();
        //return [false, "Invalid otp code"];
        return response()->json($otp, 200);

    }
}