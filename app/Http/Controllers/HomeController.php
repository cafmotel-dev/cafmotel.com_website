<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    
}
