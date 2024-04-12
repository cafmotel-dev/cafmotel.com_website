



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="A multi-step form is a long-form broken down into multiple pieces/steps to make an otherwise long form less intimidating for visitors to complete." name="description">
    <meta content="Sam Norton" name="author">
    <title>Bootstrap 5 Multi-Step Form</title>
 
    <meta content="#ffffff" name="msapplication-TileColor">
    <meta content="favicons/ms-icon-144x144.png" name="msapplication-TileImage">
    <meta content="#ffffff" name="theme-color">
    <!-- CSS -->
    <link href="{{asset('signup/css/bootstrap2.min.css')}}" rel="stylesheet">
    <link href="{{asset('signup/css/style2.css')}}" rel="stylesheet">
 <!-- CSS for Toastr -->
<!-- CSS for Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!-- JavaScript for Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>
<body>
    <!-- CONTAINER -->
   
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
     
            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                <img class="covid-image" src="{{asset('signup/img/th.jpg')}}">
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
                </div>
                <div id="qbox-container">
                    <div class="message-container">
               

                    @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {!! session('error') !!}
                        </div>
                    @endif

                                </div>
                    <form  method="post"action="{{url('store-verify-code')}}">
                        @csrf
                        <div id="steps-container">
                            <div class="step">
                                <h4> Please enter Your Code here </h4>
                            
                                <div class="form-check ps-0 q-box">
                                <div class="mt-1">
                                    <!-- <label class="form-label"> Name:</label>  -->
                                    <input class="form-control" id="code" name="code" type="text">
                                </div>
                                <div id="q-box__buttons">
                       
                                    <button id="submit-btn" type="submit"class="submit">Submit</button>
                                    <a href="{{ route('resend-code', ['userId' => $userId]) }}"id="resend"style="display:none;">resend code</a>

                        </div>
                                </div>
                            </div>
                    
                       
                         
                   
                    </form>

                </div>
            </div>
        </div>
    </div><!-- PRELOADER -->
 
    <script src="{{asset('signup/js/script2.js')}}"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/imask"></script>
      <script>
         var phoneInput = document.getElementById('code');
         var phoneMask = new IMask(phoneInput, {
             mask: '000000'
         }); 
      </script>
  
    <script>
    // Function to hide messages after 3 seconds
    setTimeout(() => {
        const messages = document.querySelectorAll('.message-container');
        messages.forEach(message => {
            message.style.display = 'none';
        });
    }, 3000);
</script>
<script>
    // Function to show the resend link
    function showResendLink() {
        document.getElementById('resend').style.display = 'block';
    }

    // Wait for 2 minutes before showing the resend link
    setTimeout(showResendLink, 120000); // 120000 milliseconds = 2 minutes

    // Function to disable the link after it's clicked
    function disableLink() {
       
        document.getElementById('resend').style.pointerEvents = 'none';
        document.getElementById('resend').style.color = 'gray'; // Optionally change the color to indicate it's disabled
    }

    // Attach click event listener to the link
    document.getElementById('resend').addEventListener('click', disableLink);
</script>

</body>
</html>