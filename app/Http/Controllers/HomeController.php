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

    
}
