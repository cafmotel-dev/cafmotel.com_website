<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\RequestDemo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
class HomeController extends Controller
{
    public function virtualNumber(){
        return view('virtual-number');
        
    }

    public function cloudCallCenterSolution(){
        return view('cloud-call-center-solutions');
        
    }

    public function ivrSolutions(){
        return view('ivr-solutions');
        
    }

    public function numberMasking(){
        return view('number-masking');
        
    }


    public function clickToCall(){
        return view('click-to-call');
        
    }


    public function leadManagement(){
        return view('lead-management');
        
    }

    public function tollFreeNumber(){
        return view('toll-free-number');
        
    }

    public function resellerProgram(){
        return view('reseller-program');
        
    }

    public function contactUs(){
        return view('contact-us');
        
    }

    public function chatBot(){
        return view('chatbot');
        
    }


    public function smsCampaign(){
        return view('sms-campaign');
        
    }

    public function autoDialer(){
        return view('auto-dialer');
        
    }

    public function voice(){
        return view('voice');
        
    }

    public function messaging(){
        return view('messaging');
        
    }

    public function ai(){
        return view('ai');
        
    }
    public function saveContact(Request $request)
{
    try {
        // Create a new Contact instance and fill it with the request data
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = preg_replace('/[^0-9]/', '', $request->phone); // Remove formatting from phone number
        $contact->message = $request->message;
        
        // Save the contact record to the database
        $contact->save();
        
        // Send an email notification
        Mail::send([], [], function ($message) use ($contact) {
            $message->to('shikhachhabra1234@gmail.com')
                    ->subject('New Contact Form Submission')
                    ->setBody("Name: {$contact->name}\nEmail: {$contact->email}\nPhone: {$contact->phone}\nMessage: {$contact->message}");
        });
        
        // Optionally, you can return a response or redirect the user
        return response()->json(['message' => 'Contact information saved successfully'], 200);
    } catch (\Exception $e) {
        // Log the error or perform any necessary actions silently
        \Log::error('Error sending email: ' . $e->getMessage());
        
        // Return a success response to the user
        return response()->json(['message' => 'Contact information saved, but email sending failed'], 200);
    }
}
public function RequestDemo(Request $request)
{
    try {
        // Create a new Contact instance and fill it with the request data
        $demo = new RequestDemo();
        $demo->email = $request->email;
   // Save the demo record to the database
        $demo->save();
        
     
        
        // Optionally, you can return a response or redirect the user
        return response()->json(['message' => 'Demo Request Sent successfully'], 200);
    } catch (\Exception $e) {
        // Log the error or perform any necessary actions silently
        
        // Return a success response to the user
        return response()->json(['message' => ' Demo Request failed'], 200);
    }
}

    
        }
    

