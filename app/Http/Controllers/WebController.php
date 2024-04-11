<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class WebController extends Controllers
{
    public function __construct()
    {
        //$this->middleware('auth');
        parent::__construct();
    }

    //home
    public function index()
    {
       // echo "s";die;
        return view('welcome');
    }

    //services
    public function virtualNumber(){
        echo "s";die;
        return view('virtual-number');
        
    }

    public function usaVirtualNumber(){
        return view('usa-virtual-number');
        
    }

    public function canadaVirtualNumber(){
        return view('canada-virtual-number');
        
    }

    public function smartIvr(){
        return view('smart-ivr');
    }

    public function distributedCallCenter(){
        return view('distributed-call-center');
    }

    public function numberMasking(){
        return view('number-masking');
        
    }

    public function tollFree(){
        return view('toll-free');
    }

    public function usaTollFreeNumber(){
        return view('usa-toll-free');
    }

    public function canadaTollFreeNumber()
    {
        return view('canada-toll-free');
    }

    public function OutboundCalling(){
        return view('outbound-calling');
        
    }

    public function eFax(){
        return view('e-fax');
    }

    public function messaging(){
          return view('messaging');
    }



    public function conferencing(){
        return view('conferencing');
    }

    public function clickTOCall(){
        return view('click-to-call');
    }

    public function progressiveDialer(){
        return view('progressive-dialer');
    }

    public function missedCallService(){
        return view('missed-call-service');
    }


    //price


    public function price()
    {
        return view('price');
    }

    //contact-us
    public function contactUs(Request $request)
    {
        if ($request->isMethod('post'))
        {
            request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);


        $inquiry = new Inquiry();
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone_number;
        $inquiry->message = $request->message;
        $inquiry->save();
        session()->flash("success", "Thanks For Inquiry We will touch with you shortly!.");
        return redirect("/contact-us");
    }
        return view('contact');
    }




    //blog code
    public function blog()
    {
        $blogs = Blogs::orderBy('id', 'DESC')->get()->all();
        //echo "<pre>";print_r($blogs);die;
        return view('blog',compact('blogs'));
    }

    public function blogDetails($url)
    {
        $blog_details = Blogs::where('url', "=", $url)->where('status', "=", '1')->first();
        //echo "<pre>";print_r($blog_details);die;
        if(!empty($blog_details)){
            return view('blog-details',compact('blog_details'));
        }
        else{
            return back();
        }
    }


    public function career()
    {
        return view('career');
    }


    public function partners()
    {
        return view('partners');
    }

    //end blog code
}