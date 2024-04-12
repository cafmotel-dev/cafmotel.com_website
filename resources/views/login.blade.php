



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
    <link href="{{asset('signup/css/bootstrap2.min.css')}}" rel="stylesheet">
    <link href="{{asset('signup/css/style2.css')}}" rel="stylesheet">
 <!-- CSS for Toastr -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

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
                    <form  method="post"action="{{url('storeLogin')}}">
                        @csrf
                        <div id="steps-container">
                            <div class="step">
                                <h4> Please enter Your Login Details</h4>
                                <div class="form-check ps-0 q-box">
                                <div class="mt-1">
                                    <label class="form-label"> Name:</label> 
                                    <input class="form-control" id="username" name="username" type="text"placeholder="name">
                                </div>
                                
                                <div class="mt-1">
                                    <label class="form-label"> Password:</label> 
                                    <div class="input-group">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="password">
                                        <button type="button" id="togglePassword" class="btn btn-outline-secondary" aria-label="Toggle password visibility">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="q-box__buttons">
                       
                            <button id="submit-btn" type="submit"class="submit">Submit</button>
                        </div>
                                </div>
                            </div>
                    
                       
                         
                   
                    </form>
                </div>
            </div>
        </div>
    </div><!-- PRELOADER -->
 
    <script src="{{asset('signup/js/script2.js')}}"></script>
   
    
  
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
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('active');
    });
</script>

</body>
</html>