<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="{{ asset('/web/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/flaticon.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/animate.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/owl.theme.default.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/boxicons.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/meanmenu.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/nice-select.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/fancybox.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/odometer.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/magnific-popup.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/style.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/dark.css')}}" />
        <link rel="stylesheet" href="{{ asset('/web/css/responsive.css')}}" />

        <title>Cafmotel-Be Inspired By Communication</title>

        <link rel="icon" type="image/png" href="{{ asset('/web/image/favicon.png')}}" />
        <style>
        #products {
            .default-btn {
                padding: 10px;
            }
        }
  
        </style>
    </head>
<body class="">
 <!-- Start Navbar Area -->
 <div class="navbar-area navbar-color-white">
     <div class="dibiz-responsive-nav">
         <div class="container-fluid">
             <div class="dibiz-responsive-menu">
                 <div class="logo">
                     <a href="/">
                         <img src="{{ asset('/web/image/logo-white.png')}}" alt="logo" />
                     </a>
                 </div>
             </div>
         </div>
     </div>

     <div class="dibiz-nav">
         <div class="container-fluid">
             <nav class="navbar navbar-expand-md navbar-light">
                 <a class="navbar-brand" href="/">
                     <img src="{{ asset('/web/image/logo-white.png')}}" alt="logo" />
                 </a>

                 <div class="collapse navbar-collapse mean-menu">
                     <ul class="navbar-nav">
                         <li class="nav-item"id="homeMenu">
                             <a href="/" class="nav-link active">Home </a>

                         </li>

                         <li class="nav-item">
                             <a href="#" class="nav-link">Products <i class="bx bx-chevron-down"></i></a>
                             <ul class="dropdown-menu">
                                 <li class="nav-item"id="voiceMenu">
                                     <a href="/voice" class="nav-link">Voice<i class="bx bx-chevron-right"></i></a>
                                     <ul class="dropdown-menu"id="voiceSubMenu">
                                         <li class="nav-item">
                                             <a href="/cloud-call-center-solutions" class="nav-link">Cloud Contact
                                                 Centre</a>
                                         </li>

                                         <li class="nav-item">
                                             <a href="/virtual-number" class="nav-link">Virtual Number</a>
                                         </li>

                                         <li class="nav-item">
                                             <a href="/ivr-solutions" class="nav-link">IVR Solution</a>
                                         </li>
                                         <li class="nav-item">
                                             <a href="/number-masking" class="nav-link">Number Masking</a>
                                         </li>
                                         <li class="nav-item">
                                             <a href="/click-to-call" class="nav-link">Click to Call</a>
                                         </li>
                                         <li class="nav-item">
                                             <a href="/lead-management" class="nav-link">Lead Management</a>
                                         </li>
                                         
                                         <li class="nav-item">
                                             <a href="/toll-free-number" class="nav-link">Toll Free Number</a>
                                         </li>

                                           <li class="nav-item">
                                             <a href="/auto-dialer" class="nav-link">Auto Dialer</a>
                                         </li>

                                        



                                         <!--  <li class="nav-item">
                                             <a href="" class="nav-link">Automated Outbound Calling</a>
                                         </li> <li class="nav-item">
                                             <a href="" class="nav-link">WebRTC & MPLS</a>
                                         </li>
                                          <li class="nav-item">
                                             <a href="" class="nav-link">Truecaller</a>
                                         </li> -->
                                        
                                     </ul>
                                 </li>

                                 <li class="nav-item">
                                     <a href="/messaging" class="nav-link">Messaging <i
                                             class="bx bx-chevron-right"></i></a>
                                     <ul class="dropdown-menu">
                                         <li class="nav-item">
                                             <a href="/sms-campaign" class="nav-link"> SMS Campaigns</a>
                                         </li>

                                         <!-- <li class="nav-item">
                                             <a href="portfolio-5.html" class="nav-link">Transactional SMS</a>
                                         </li>

                                         <li class="nav-item">
                                             <a href="portfolio-6.html" class="nav-link">WhatsApp Business API</a>
                                         </li> -->
                                     </ul>
                                 </li>
                                 <li class="nav-item">
                                     <a href="/ai" class="nav-link">AI <i class="bx bx-chevron-right"></i></a>
                                     <ul class="dropdown-menu">


                                         <li class="nav-item">
                                             <a href="#" class="nav-link">SMS AI</a>
                                         </li>

                                         <li class="nav-item">
                                             <a href="/chatbot" class="nav-link">ChatBot</a>
                                         </li>
                                     </ul>
                                 </li>

                             </ul>
                         </li>

                         <li class="nav-item"id="resellerMenu">
                             <a href="/reseller-program" class="nav-link">Reseller Program</a>
                         </li>
                        
                        <li class="nav-item"id="contactMenu">
                             <a href="/contact-us" class="nav-link">Contact Us</a>
                         </li>
                         <li class="nav-item"id="registerMenu">
                             <a href="/sign-up" class="nav-link">Register </a>

                         </li>
                         <li class="nav-item"id="loginMenu">
                             <a target="_blank" href="{{env('SIGN_IN')}}" class="nav-link">Login </a>
                         </li>
                     </ul>

                     {{--<div class="d-flex align-items-center" style="padding: 15px;">
                               
                                <div class="option-item">
                                    <a href="/sms/chat/demo" class="default-btn">AI Demo<i class="flaticon-chevron"></i></a>
                                </div>
                               
                            </div>--}}

             </nav>
         </div>
     </div>

 </div>
 <!-- End Navbar Area -->

            @yield('content')

          <section class="dibiz-subscribe-area bg-F7F8FF ptb-100">
    <div class="container">
        <div class="dibiz-subscribe-content wow animate__ animate__fadeInUp animated" data-wow-delay="400ms"
            data-wow-duration="1000ms"
            style="visibility: visible; animation-duration: 1000ms; animation-delay: 400ms; animation-name: fadeInUp;">
            <!-- <span class="sub-title">Request A Demo</span> -->
            <h2>Request A Demo</h2>
            <p>Submit a request to acquire an Advanced Auto & Predictive Dialer software tailored for your call center
                enterprise. Boost sales efficiently!</p>
                <div id="validator-newsletter" class="form-result"></div>
            <form class="newsletter-form" data-bs-toggle="validator" novalidate="true"id="newsletter-form">
                @csrf
                <input type="email" class="input-newsletter" placeholder="Enter your email address" name="email"
                    required="" autocomplete="off"id="email">
                <button type="submit" class="default-btn-with-radius disabled"
                    style="pointer-events: all; cursor: pointer;">Submit Now <i
                        class="flaticon-next-button"></i></button>
            </form>
        </div>
    </div>
    <div class="dibiz-subscribe-shape-1">
        <img src="{{ asset('/web/image/shape-1.png')}}" alt="image">
    </div>
    <div class="dibiz-subscribe-shape-2">
        <img src="{{ asset('/web/image/shape-2.png')}}" alt="image">
    </div>
</section>

<!-- Start Project Start Area -->
<section class="project-start-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="project-start-image">
                    <img src="{{ asset('/web/image/project-start1.png')}}" alt="image" />
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="project-start-content">
                    <span class="sub-title">Get Started</span>
                    <h2>Our support center is available round the clock 365 days.</h2>
                    <p>
                        We'd love to hear from you. Here's how you can reach us. Interested in the Cafmotel
                        platform but don't know what to choose? Give us a call and we'll offer the solution that
                        works for your industry.


                    </p>
                    <a href="sign-up" class="default-btn">Get Started</a>
                </div>
            </div>
        </div>
    </div>

    <div class="shape2">
        <img src="{{ asset('/web/image/shape2.png')}}" alt="image" />
    </div>
    <div class="shape3">
        <img src="{{ asset('/web/image/shape3.png')}}" alt="image" />
    </div>
    <div class="shape5">
        <img src="{{ asset('/web/image/shape5.png')}}" alt="image" />
    </div>
    <div class="shape6">
        <img src="{{ asset('/web/image/shape6.png')}}" alt="image" />
    </div>
    <div class="shape7">
        <img src="{{ asset('/web/image/shape7.png')}}" alt="image" />
    </div>
    <div class="shape13">
        <img src="{{ asset('/web/image/shape13.png')}}" alt="image" />
    </div>
</section>
<!-- End Project Start Area -->

<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="single-footer-widget">
                    <a href="index-2.html" class="logo">
                        <img src="{{ asset('/web/image/logo-white.png')}}" alt="logo" />
                    </a>
                    <p>
                        We at Cafmotel help every small or big business to rule the world with the smartest
                        communication solutions. Making it simple and straightforward to generate leads, building
                        relations, and converting the interaction into a deal, we help the enterprises to grow their
                        revenue through our all-in-one "Voice, Text, Email, and Fax" platform by holding hands through
                        the entire process.
                    </p>

                    <ul class="social-link">
                        <li>
                            <a href="#" class="d-block" target="_blank"><i class="bx bxl-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="d-block" target="_blank"><i class="bx bxl-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="d-block" target="_blank"><i class="bx bxl-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" class="d-block" target="_blank"><i class="bx bxl-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3>Explore</h3>

                    <ul class="footer-links-list">
                        <li><a href="/">Home</a></li>
                        <li><a href="reseller-program">Reseller Program</a></li>
                        <li><a href="contact-us">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3>Products</h3>

                    <ul class="footer-links-list">
                        <li>
                            <a href="cloud-call-center-solutions">Cloud Contact Centre</a>
                        </li>

                        <li>
                            <a href="virtual-number">Virtual Number</a>
                        </li>

                        <li>
                            <a href="ivr-solutions">IVR Solution</a>
                        </li>
                        <li>
                            <a href="number-masking">Number Masking</a>
                        </li>
                        <li>
                            <a href="lead-management">Lead Management</a>
                        </li>

                        <li>
                            <a href="toll-free-number">Toll Free Number</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-2">
                    <h3>Products</h3>

                    <ul class="footer-links-list">

                        <li>
                            <a href="auto-dialer">Auto Dialer</a>
                        </li>
                        <li>
                            <a href="click-to-call">Click to Call</a>
                        </li>
                        <li>
                            <a href="sms-campaign">SMS Campaign</a>
                        </li>


                        <li>
                            <a href="#">SMS AI</a>
                        </li>

                        <li>
                            <a href="chatbot">ChatBot</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="single-footer-widget">
                    <h3>Contact us</h3>

                    <ul class="footer-contact-info">

                        <li><i class="bx bx-phone-call"></i><a href="tel:
                    +18446142007 ">
                                +1 844-614-2007 </a></li>
                        <li><i class="bx bx-envelope"></i><a
                                href="mailto:sales@cafmotel.com"><span>sales@cafmotel.com</span></a>
                        </li>
                        <li><i class="bx bx-map"></i><a href="#"><span>169 Madison Ave STE 2945 New York, NY
                                    10016</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <p>
                        © 2021 All rights reserved
                        <a href="/" target="_blank">Cafmotel</a>
                    </p>
                </div>

                <div class="col-lg-6 col-md-6">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="shape16">
        <img src="{{ asset('/web/image/shape16.png')}}" alt="image" />
    </div>

<script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "siq9ee938910a6da4899a04a27b0da9d32f2955514323f2fbf5094a623ccebb770531b8643317be176f304a99511a2d1fea", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zohopublic.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>

</footer>
<!-- End Footer Area -->

<div class="go-top"><i class="bx bx-up-arrow-alt"></i></div>

<!-- Links of JS files -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ asset('/web/js/jquery.min.js')}}"></script>
<script src="{{ asset('/web/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('/web/js/appear.min.js')}}"></script>
<script src="{{ asset('/web/js/odometer.min.js')}}"></script>
<script src="{{ asset('/web/js/magnific-popup.min.js')}}"></script>
<script src="{{ asset('/web/js/fancybox.min.js')}}"></script>
<script src="{{ asset('/web/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('/web/js/meanmenu.min.js')}}"></script>
<script src="{{ asset('/web/js/nice-select.min.js')}}"></script>
<script src="{{ asset('/web/js/sticky-sidebar.min.js')}}"></script>
<script src="{{ asset('/web/js/wow.min.js')}}"></script>
<script src="{{ asset('/web/js/form-validator.min.js')}}"></script>
<script src="{{ asset('/web/js/contact-form-script.js')}}"></script>
<script src="{{ asset('/web/js/ajaxchimp.min.js')}}"></script>
<script src="{{ asset('/web/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#newsletter-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var emailInput = $('#email').val().trim(); // Get the trimmed value of the email input
        var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; // Regular expression to validate email format

        // Check if email input is empty or not in valid email format
        if (emailInput === '') {
            $('#validator-newsletter').html('<div class="alert alert-danger">Please enter your email.</div>');
            setTimeout(function() {
                $('#validator-newsletter').empty(); // Clear the message after 3 seconds
            }, 3000);
        } else if (!emailRegex.test(emailInput)) {
            $('#validator-newsletter').html('<div class="alert alert-danger">Please enter a valid email.</div>');
            setTimeout(function() {
                $('#validator-newsletter').empty(); // Clear the message after 3 seconds
            }, 3000);
        } else {
            // Email input is valid, proceed with form submission
            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: 'request-demo', // Make sure this URL is correct
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the success response here
                    $('#validator-newsletter').html('<div class="alert alert-success">Demo Request Sent successfully.</div>');
                    // Optionally, you can reset the form after successful submission
                    $('#newsletter-form')[0].reset();
                    setTimeout(function() {
                $('#validator-newsletter').empty(); // Clear the message after 3 seconds
            }, 3000);
                },
                error: function(xhr, status, error) {
                    // Handle the error response here
                    $('#validator-newsletter').html('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
                    setTimeout(function() {
                $('#validator-newsletter').empty(); // Clear the message after 3 seconds
            }, 3000);
                }
            });
        }
    });
});

</script>
<script>
$(document).ready(function() {
    // Get the current page URL
    var currentUrl = window.location.href;

    // Check if the current URL matches any of the menu item URLs
    $('.navbar-nav a').each(function() {
        var menuItemUrl = $(this).attr('href');

        // Exclude specific URLs from being considered for active class
        if (menuItemUrl !== '{{ env('SIGN_IN') }}') {
            if (currentUrl.includes(menuItemUrl)) {
                $(this).addClass('active'); // Add active class to the menu item

                // Remove active class from other menu items
                $('.navbar-nav a').not(this).removeClass('active');

                // Optional: Add active class to parent menu items if needed
                $(this).parents('.nav-item').children('.nav-link').addClass('active');
            }
        }
    });
});


    </script>
</body>

</html>

           



  
    @yield('pageJavascript')
</body>

</html>

       
