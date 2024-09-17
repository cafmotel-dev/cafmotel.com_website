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

    public function otpPhone(Request $request) {
        $verified = PhoneVerification::where('phone_number',$request->phone_number)->where('status',4)->get()->first();

        if($verified)
            if($verified->status == 4) {
                return response()->json($verified, 200);
            }

            //backend api call for sms chat ai settings
            $api_url   = env('APP_URL').'/open-ai-setting-website';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response);

            $cli = $result->data[0]->cli;
            $number = $request->country_code.$request->phone_number;

            //send sms using telnyx api
            $otp_value = mt_rand(100000, 999999);

            if (app()->environment() == "local") 
            {
                $response_id = true;
            }
            else
            {
                /*$telnyxApiEndpoint = 'https://api.telnyx.com/v2/messages';
                $message = 'Your verification code is:'.$otp_value;

                $data = array('from' => '+'.$cli, 'to' => '+'.$number, 'text' => $message);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $telnyxApiEndpoint);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Authorization: Bearer '.env('TELNYX_TOKEN'),
                ]);

                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                $response = curl_exec($ch);
                curl_close($ch);
                $json_decode = json_decode($response);
                $response_id = $json_decode->data->id;
                //return response()->json($response, 200);*/


                $sid = env('SID');
                $token = env('TOKEN');

                $ch = curl_init();
                $message = 'Your verification code is:'.$otp_value;
                $from = env('TWILIO_NUMBER');
                $to = '+'.$number;



                curl_setopt($ch, CURLOPT_URL, 'https://api.twilio.com/2010-04-01/Accounts/'.$sid.'/Messages');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "Body=".$message."&From=".$from."&To=".$to."");
                curl_setopt($ch, CURLOPT_USERPWD, $sid . ':' . $token);

                $headers = array();
                $headers[] = 'Content-Type: application/x-www-form-urlencoded';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);
                //echo "<pre>";print_r($result);die;
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }
                curl_close($ch);



            }

            

            if($response_id) {
                $otp = new PhoneVerification();
                $otp->id = Str::uuid()->toString();
                $otp->country_code = $request->country_code;
                $otp->phone_number = $request->phone_number;
                $otp->code = $otp_value;
                $otp->sms_response_id = "12345";//$response_id;
                $otp->name = $request->name;
                $otp->expiry = (new \DateTime())->modify("+15 minutes");
                $otp->status = self::REQUESTED;
                $otp->saveOrFail();
                return response()->json($otp, 200);
            }
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
                //backend api call for sms chat ai settings
                
                $api_url   = env('APP_URL').'/open-ai-setting-website';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $api_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                $response = curl_exec($ch);
                curl_close($ch);

                $result = json_decode($response);

                $cli = $result->data[0]->cli;
                $number = $otp->country_code.$otp->phone_number;
                $introduction = $result->data[0]->introduction;
                $description = $result->data[0]->description;
                $access_token = $result->data[0]->access_token;

                if (app()->environment() == "local") {
                    $response_id = true;
                }
                else {

                    if($request->reset == 1)
                    {
                        //sms ai delete data
                        $deleteSms = env('TELNYX_SMS_AI_URL').'sms/delete?cli='.$cli.'&number='.$number;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $deleteSms);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                            'accept: application/json',
                            'x-api-key: '.$access_token,
                            'Content-Type: application/json',
                        ]);

                        $response = curl_exec($ch);
                        curl_close($ch);

                        //flush cache api

                        $flushCache = env('TELNYX_SMS_AI_URL').'sms/flush-cache';
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $flushCache);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                            'accept: application/json',
                            'x-api-key: '.$access_token,
                            'Content-Type: application/json',
                        ]);

                        $response = curl_exec($ch);
                        curl_close($ch);
                    }

                    $sendSms = env('TELNYX_SMS_AI_URL').'sms/send';
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $sendSms);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'accept: application/json',
                        'x-api-key: '.$access_token,
                        'Content-Type: application/json',
                    ]);

                    $array = ['cli' => '+'.$cli,'number' => '+'.$number, 'introduction' => $introduction,'description' => $description];
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
                    $response = curl_exec($ch);
                    curl_close($ch);
                    
                    
                }

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

    public function otpPhoneReset(Request $request) {
        //$verified = PhoneVerification::where('phone_number',$request->phone_number)->where('status',4)->get()->first();

       /* if($verified)
            if($verified->status == 4) {
                return response()->json($verified, 200);
            }*/

            //backend api call for sms chat ai settings
            $api_url   = env('APP_URL').'/open-ai-setting-website';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response);

            $cli = $result->data[0]->cli;
            $number = $request->country_code.$request->phone_number;

            //send sms using telnyx api
            $otp_value = mt_rand(100000, 999999);

            if (app()->environment() == "local") 
            {
                $response_id = true;
            }
            else
            {
                $telnyxApiEndpoint = 'https://api.telnyx.com/v2/messages';
                $message = 'Your verification code is:'.$otp_value;

                $data = array('from' => '+'.$cli, 'to' => '+'.$number, 'text' => $message);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $telnyxApiEndpoint);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Authorization: Bearer '.env('TELNYX_TOKEN'),
                ]);

                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                $response = curl_exec($ch);
                curl_close($ch);
                $json_decode = json_decode($response);
                $response_id = $json_decode->data->id;
                //return response()->json($response, 200);
            }

            

            if($response_id) {
                $otp = new PhoneVerification();
                $otp->id = Str::uuid()->toString();
                $otp->country_code = $request->country_code;
                $otp->phone_number = $request->phone_number;
                $otp->code = $otp_value;
                $otp->sms_response_id = $response_id;
                $otp->name = $request->name;
                $otp->expiry = (new \DateTime())->modify("+15 minutes");
                $otp->status = self::REQUESTED;
                $otp->saveOrFail();
                return response()->json($otp, 200);
            }
        }
}