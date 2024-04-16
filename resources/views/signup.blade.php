


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    .error-message {
    color: red;
    font-size: 0.8rem;
    margin-top: 5px;
    display: block;
}
.weak {
    border-color: red;
}

.strong {
    border-color: green;
}
.password-message{
    color: red;
    font-size: 0.8rem;
    margin-top: 5px;
    display: block;
}
</style>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
    
            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                    <img class="covid-image" src="{{asset('signup/img/th.jpg')}}">
                    <!-- <h2>Signup Form</h2> -->
                    <!-- <h3>Signup Form</h3> -->
                    <!-- <p>Please Signin for further processing in website.</p> -->
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
                </div>
                <div id="qbox-container">
                    <form id="myForm" method="post"action="{{url('store')}}">
                        @csrf
                        <div id="steps-container">
                            <div class="step">
                                <h4>Hi there, may I know your name ?</h4>
                                <div class="form-check ps-0 q-box">
                                <div class="mt-1">
                                    <!-- <label class="form-label"> Name:</label>  -->
                                    <input class="form-control" id="name" name="name" type="text"required>
                                </div>
                                
                                </div>
                            </div>
                            <div class="step">
    <h4>Hey, could you share your Number with us?</h4>
    <div class="form-check ps-0 q-box">
        <div class="mt-2">
        <form method="post" action="{{ url('send-mobile-otp') }}">
    @csrf
    <div class="row">
        <div class="col-md-4">                                  
            <select class="form-select" name="country_code" id="country_code">
                <option value="1">USA (+1)</option>
                <option value="1">Canada (+1)</option>
                <option value="91">India (+91)</option>
            </select>
        </div>
        <div class="col-md-6">
            <input class="form-control" id="phone" name="phone" type="text" required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Verify</button>
        </div>
    </div>
</form>

            <div id="otpInput" style="display: none;">
                <h4>Enter OTP:</h4>
                <input  id="otp" name="otp" type="text" class="form-control">
                <button type="submit" class="btn btn-primary">Submit</button>

                <!-- Add any additional OTP verification logic here -->
            </div>
        </div>
    </div>
</div>


                            <div class="step">
                                <h4>Hey, could you share your email with us?</h4>
                                <div class="form-check ps-0 q-box">
                                <div class="mt-2">
                                    <!-- <label class="form-label">Email:</label>  -->
                                    <input class="form-control" id="email" name="email" type="email"required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                </div>
                                 
                                </div>
                            </div>
                            <div class="step">
                                <h4>Hey, could you share your Number with us?</h4>
                                <div class="form-check ps-0 q-box">
                             
                                    <div class="mt-2">
                                        <div class="row">
                    
                      
                                    <div class="col-md-3">                                  
                                    <select class="form-select" name="country_code" id="country_code">
                                        <option  value="1">USA (+1)</option>
                                        <option value="1">Canada (+1)</option>
                                        <option  value="91">India (+91)</option>
                                      
                                    </select>
                                </div>
                                <div class="col-md-6">
                                        <input class="form-control" id="phone" name="phone" type="text"required>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                       
                         
                            <div class="step">
                                <h4>Make sure you have a strong password.</h4>
                                <div class="row">
                      
                                  
                                <div class="mt-1">
                                    <!-- <label class="form-label">Password:</label>  -->
                                    <input class="form-control" id="password" name="password" type="password"required>
                                    <span class="password-message"></span>
                                </div>
                               
                                </div>
                            </div>
                            <div class="step">
                                <div class="mt-1">
                                    <div class="closing-text">
                                        <h4>That's about it! Stay Cool!</h4>
                                        <p>Thank you for signing up.</p>
                                        <p>Click on the submit button to continue.</p>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div id="q-box__buttons">
                            <button id="prev-btn" type="button">Previous</button> 
                            <button id="next-btn" type="button">Next</button> 
                            <button id="submit-btn" type="submit"class="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- PRELOADER -->
    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>
    <script src="{{asset('signup/js/script2.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/imask"></script>
      <script>
         var phoneInput = document.getElementById('phone');
         var phoneMask = new IMask(phoneInput, {
             mask: '(000) 000-0000'
         }); 
      </script>
   <script> 
    // Get the email input element
const emailInput = document.getElementById('email');

// Function to create an error message element
const createErrorMessage = (message) => {
    const errorMessage = document.createElement('span');
    errorMessage.className = 'error-message';
    errorMessage.textContent = message;
    return errorMessage;
};

// Add an event listener for input changes
emailInput.addEventListener('input', function() {
    // Get the entered email value
    const emailValue = this.value.trim();

    // Regular expression to match a valid email format
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Get existing error message element, if any
    let errorMessageElement = this.nextElementSibling;

    // Check if the entered email matches the pattern
    if (emailPattern.test(emailValue)) {
        // Email is valid, remove any existing 'invalid' class and error message
        this.classList.remove('invalid');
        if (errorMessageElement && errorMessageElement.classList.contains('error-message')) {
            errorMessageElement.remove();
        }
    } else {
        // Email is invalid, add 'invalid' class to highlight it and show error message
        this.classList.add('invalid');
        if (!errorMessageElement || !errorMessageElement.classList.contains('error-message')) {
            errorMessageElement = createErrorMessage('Please enter a valid email address.');
            this.parentNode.insertBefore(errorMessageElement, this.nextElementSibling);
        }
    }
});

</script>
<script>
// Get the password input element
const passwordInput = document.getElementById('password');

// Function to check password strength
const checkPasswordStrength = (password) => {
    // Define the criteria for a strong password
    const minLength = 8; // Minimum length
    const hasUpperCase = /[A-Z]/.test(password); // At least one uppercase letter
    const hasLowerCase = /[a-z]/.test(password); // At least one lowercase letter
    const hasNumber = /\d/.test(password); // At least one number
    const hasSpecialChar = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password); // At least one special character

    // Check if the password meets all criteria
    if (password.length >= minLength && hasUpperCase && hasLowerCase && hasNumber && hasSpecialChar) {
        return 'strong'; // Password is strong
    } else {
        return 'weak'; // Password is weak
    }
};

// Add an event listener for input changes
passwordInput.addEventListener('input', function() {
    // Get the entered password value
    const passwordValue = this.value.trim();

    // Check the password strength
    const passwordStrength = checkPasswordStrength(passwordValue);

    // Update the password input's class based on strength
    this.classList.remove('weak', 'strong');
    this.classList.add(passwordStrength);

    // Get the span element for displaying the message
    const messageSpan = this.parentElement.querySelector('.password-message');

    // Update the span message based on strength
    if (passwordStrength === 'weak') {
        messageSpan.textContent = 'Please enter 8 digits stronger password';
    } else {
        messageSpan.textContent = '';
    }
});

    </script>


</body>
</html>