<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="{{ asset('/web/css/sms_chat_demo.css')}}" />

	<title>Sign in & Sign up Form</title>

	
</head>

<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
			<form action="" class="sign-in-form" method="post">
          @csrf
					<h2 class="title">Sign in</h2>
          
                    <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Username" name="username"/>
                    </div>
                    <div class="input-field">
                      <i class="fas fa-lock"></i>
                      <input type="password" placeholder="Password"name="password" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
        </form>
					<p class="social-text"></p>
					<div class="social-media">
		
					</div>
				<form action=""class="sign-up-form">
                    
					<h2 class="title"id="sign_up"style="display:none;">Sign up</h2>
					<h6 class="title"id="phn_no">Please Enter Your Number</h6>


          <h2 class="title otp_div"style="display:none;" >Verify Phone OTP</h2>

          <span style="line-height: 1.5;"  class="" id="message"></span>


          <input type="hidden" id="uuid"  />


          <div class="row justify-content-center otp_div" style="display: none;">
          <div class="col-12 col-md-6 col-lg-4">
          <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
          <div class="card-body p-5 text-center">


          <div class="otp-field mb-4">
          <input type="number" name="digit1" class="otp-digit" id="otp_1"/>
    <input type="number" name="digit2" class="otp-digit" id="otp_2"disabled />
    <input type="number" name="digit3" class="otp-digit"id="otp_3" disabled />
    <input type="number" name="digit4" class="otp-digit" id="otp_4"disabled />
    <input type="number" name="digit5" class="otp-digit" id="otp_5"disabled />
    <input type="number" name="digit6" class="otp-digit" id="otp_6"disabled />
          </div>
<!-- Hidden input field to store combined OTP digits -->
<input type="hidden" name="combined_otp" id="combinedOtp"val="" />
                    <input type="button" value="Submit" style="display:none;" id="" class="btn solid" />


          </div>
          </div>
          </div>
          </div>
          <h2 class="title otp_email_div" style="display:none;">Verify Email OTP</h2>

          <span style="line-height: 1.5;"  class="" id="messageEmail"></span>

          <input type="hidden" id="uuidEmail"val=""  />



          <div class="row justify-content-center otp_email_div" style="display: none;">
          <div class="col-12 col-md-6 col-lg-4">
          <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
          <div class="card-body p-5 text-center">


          <div class="otp-field mb-4">
          <input type="number" name="digit1" class="otp-digit-email"id="otp_1_email" />
          <input type="number" name="digit2" class="otp-digit-email"id="otp_2_email" disabled />
          <input type="number" name="digit3" class="otp-digit-email" id="otp_3_email"disabled />
          <input type="number" name="digit4" class="otp-digit-email" id="otp_4_email"disabled />
          <input type="number" name="digit5" class="otp-digit-email"id="otp_5_email" disabled />
          <input type="number" name="digit6" class="otp-digit-email"id="otp_6_email" disabled />
          </div>
          <input type="hidden" name="combined_otp" id="combinedOtpEmail"val="" />
                    <input type="button" value="Submit" style="display:none;" id="" class="btn solid" />

                    <input type="button" value="Submit" style="display:none;" id="" class="btn solid" />

                    <p class="resend text-muted mb-0 otp_email_div" id="otp_email_div" style="display:none;">
                      
                    <span id="time_left_email" >Time Left : <span id="timer_email"></span></span>
              Didn't receive code? <a type="button"id="resend_otp_email" class="disabled" href="javascript:0">Resend</a>
            </p>
          </div>
          </div>
          </div>
          </div>
 
                <span style="line-height: 3;"  class="" id="messageEmail"></span>


                <div class="input-field email_div"style="display:none;">
                  <i class="fas fa-envelope"></i>
                  <input type="email" placeholder="Email"name="email"id="email"class="form-control"required />
                </div>
                <input type="button" value="Submit" id="submitEmail" class="btn solid email_div" style="display:none;" />


					<div class="input-field phn_div">
            
          <i class="fas fa-globe"></i>
            <select type="text" class="form-control select" id="country_code"   placeholder="Username" >
              <option value="1">USA</option>
              <option value="1">Canada</option>
            </select>
					</div>
          <div class="input-field phn_div">
            <i class="fas fa-phone"></i>
            <input type="text" id="phone" autocomplete="nope" autocomplete="off" placeholder="Phone Number"/>
          </div>
          <a id="captchaTable"
      class="flex justify-center social-icon phn_div" style="
    font-size: 20px;
    height: 25px;
    font-style: oblique;
    border: none;
    ">
    </a>

      <button id="refreshButton"
          class="bg-blue-500 text-white px-6 py-2 
            rounded-md focus:outline-none phn_div" style="background: #F86F03;
    border: none;
    border-radius: 37px;
    padding: 6px;
    color: white;
    cursor: pointer;
">
        Refresh Captcha <i class="fa fa-refresh" aria-hidden="true"></i>
      </button>

           <div class="input-field phn_div" >
          <i class="fa fa-refresh" aria-hidden="true"></i>

             <input type="text" id="captchaInput" placeholder="Enter Captcha" >
      <!-- Button to refresh the Captcha -->
          </div>
          <div id="resultMessage"style="display:none;">  </div>   


                    <div class="input-field password_div"style="display:none;">
                      <i class="fas fa-user"></i>
                      <input type="text" placeholder="Enter your Name" name="name"pattern="[A-Za-z]{3,}" title="Please enter at least 3 letters (no numbers or special characters)"required/>
                    </div>
					<div class="input-field password_div"style="display:none;">
						<i class="fas fa-lock"></i>
            <input type="password" id="password" placeholder="Enter your Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?=.*\w).{6,}" title="Password must be at least 6 characters long and include at least one uppercase letter, one lowercase letter, one number, one special character, and no spaces" required />					
           </div>
                <input type="button" value="Submit" id="submitRegister" class="btn solid password_div" style="display:none;" />

                <!-- <input type="button" value="Submit" id="submitEmail" class="btn solid email_div" style="display:none;" /> -->
				
          <input type="button" value="Submit" id="submitPhone" class="btn solid phn_div" />

          <input type="button" value="Verify" id="verifybtn"class="btn solid otp_div" style="display:none;" />
          <input type="button" value="Verify" id="verifybtnEmail" class="btn solid otp_email_div" style="display:none;" />


          <p class="resend text-muted mb-0 otp_div" id="otp_div" style="display:none;">
              <span id="time_left" >Time Left : <span id="timer"></span></span>

              Didn't receive code? <a id="resend_otp" class="disabled" href="javascript:0">Resend</a>
            </p>
</form>
					<p class="social-text"></p>
					<div class="social-media">
						<!-- <a href="#" class="social-icon">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-google"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-linkedin-in"></i>
						</a> -->
					</div>
				</form>
			</div>
		</div>
    <div class="thankyoucontent"id="thankyou_div" style="background: #F86F03;display:none;  max-width: 500px;
    margin: 0 150px;" >
    <div class="wrapper-1">
    <div class="wrapper-2">
       <img src="https://i.ibb.co/Lkn7rkG/thank-you-envelope.png" alt="thank-you-envelope" border="0">
     <h1>Thank you!</h1>
      <p> You have been  registered Successfully</p> 

    </div>
   
   
</div>
</div>
		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>New User ?</h3>
					<p>
					Join us and be part of an amazing community!
					</p>
					<button class="btn transparent" id="sign-up-btn">
						Sign up
					</button>
				</div>
				<img  src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h3>Existing User ?</h3>
					<p>
					Ready to dive back in? Sign in and let's continue the journey!
					</p>
					<button class="btn transparent" id="sign-in-btn">
						Sign in
					</button>
				</div>
				<img src="https://i.ibb.co/nP8H853/Mobile-login-rafiki.png"  class="image" alt="" />
			</div>
		</div>
	</div>

	<script src="app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/imask"></script>
  <script>
    var phoneInput = document.getElementById('phone');
    var phoneMask = new IMask(phoneInput, {
      mask: '(000) 000-0000'
    }); 
</script>
	<script>
		const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
	</script>
 

    <script>
      
      const inputs = document.querySelectorAll(".otp-field > input");
const button = document.querySelector(".btn");

window.addEventListener("load", () => inputs[0].focus());
button.setAttribute("disabled", "disabled");

inputs[0].addEventListener("paste", function (event) {
  event.preventDefault();

  const pastedValue = (event.clipboardData || window.clipboardData).getData(
    "text"
  );
  const otpLength = inputs.length;

  for (let i = 0; i < otpLength; i++) {
    if (i < pastedValue.length) {
      inputs[i].value = pastedValue[i];
      inputs[i].removeAttribute("disabled");
      inputs[i].focus;
    } else {
      inputs[i].value = ""; // Clear any remaining inputs
      inputs[i].focus;
    }
  }
});

inputs.forEach((input, index1) => {
  input.addEventListener("keyup", (e) => {
    const currentInput = input;
    const nextInput = input.nextElementSibling;
    const prevInput = input.previousElementSibling;

    if (currentInput.value.length > 1) {
      currentInput.value = "";
      return;
    }

    if (
      nextInput &&
      nextInput.hasAttribute("disabled") &&
      currentInput.value !== ""
    ) {
      nextInput.removeAttribute("disabled");
      nextInput.focus();
    }

    if (e.key === "Backspace") {
      inputs.forEach((input, index2) => {
        if (index1 <= index2 && prevInput) {
          input.setAttribute("disabled", true);
          input.value = "";
          prevInput.focus();
        }
      });
    }

    button.classList.remove("active");
    button.setAttribute("disabled", "disabled");

    const inputsNo = inputs.length;
    if (!inputs[inputsNo - 1].disabled && inputs[inputsNo - 1].value !== "") {
      button.classList.add("active");
      button.removeAttribute("disabled");

      return;
    }
  });
});

    </script>
 
    <script>
$(document).ready(function(){
    $(".otp-digit").on('input', function() {
        var combinedOtp = '';
        $(".otp-digit").each(function() {
            combinedOtp += $(this).val();
        });
        $("#combinedOtp").val(combinedOtp);

        console.log('Combined OTP:', combinedOtp); // Log combined OTP for debugging
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#verifybtn").click(function() {
    $("#message").show();

    var otp = $("#combinedOtp").val();
    console.log('OTP:', otp); // Log OTP value for debugging
    var uuid = $("#uuid").val();
    if (!otp.trim()) {
        // If OTP is empty or only whitespace characters, show an error message
        $("#message").html('Please enter the one-time password.');
        return false; // Prevent further execution of the function
    }
    if (otp.length !== 6) {
        // If OTP length is not 6, show an error message
        $("#message").html('Please enter a 6-digit one-time password.');
        $(".otp-digit").val('');

        return false; // Prevent further execution of the function
    }
    $.ajax({
        url: '/verifyCode',
        type: 'POST',
        data: {_token: CSRF_TOKEN, otp: otp, uuid: uuid},
        dataType: 'JSON',
        success: function (data) { 
          $("#otp_1").val('');
         $("#otp_2").val('');
              $('#otp_2').attr('disabled', true);

         $("#otp_3").val('');
              $('#otp_3').attr('disabled', true);

         $("#otp_4").val('');
              $('#otp_4').attr('disabled', true);

         $("#otp_5").val('');
              $('#otp_5').attr('disabled', true);

         $("#otp_6").val('');
              $('#otp_6').attr('disabled', true);
            $("#message").html('Your number has been verified successfully.Please enter your email for further process.');
            $(".otp_div").hide();
            $(".email_div").show();
          
        },
        error: function (xhr, status, error) {
            // Handle error cases if needed
            $(".otp-digit").val('');

            var response = xhr.responseJSON;
            if (response && response.message) {
                $("#message").html(response.message);
            } else {
                $("#message").html('An error occured during form submission.');
            }
        }
    }); 
});
});

    //email verification

  
    $(".otp-digit-email").on('input', function() {
        var combinedOtp = '';
        $(".otp-digit-email").each(function() {
            combinedOtp += $(this).val();
        });
        $("#combinedOtpEmail").val(combinedOtp);

        console.log('Combined OTP:', combinedOtp); // Log combined OTP for debugging
    });
    $(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var timerInterval;

    $("#submitEmail").click(function() {
    var email = $("#email").val().trim(); // Trim to remove leading/trailing spaces

    if(email) {
        $("#messageEmail").show();
        $("#message").hide();
        $("#sign_up").hide();
        var countdown = 60; // Seconds for the countdown
        timerInterval = setInterval(function() {
            $('#timer_email').text(countdown);
            countdown--;
            if (countdown < 0) {
                clearInterval(timerInterval); // Stop the timer
                $('#timer_email').text('');
                $('#time_left_email').hide(); // Clear the timer display
                $('#resend_otp_email').removeClass('disabled'); // Enable the resend button
            }
        }, 1000);

        $.ajax({
            url: '/otp/email',
            type: 'POST',
            data: {_token: CSRF_TOKEN, email: email},
            dataType: 'JSON',
            success: function (data) {
                console.log(data);
                $("#uuidEmail").val(data.id);
                $("#email").prop("readonly", false);

                if (data.status == 'Verified') {
                    $(".otp_email_div").hide();
                    $(".email_div").show();
                    
                    $("#messageEmail").html('Your email is Already Verified');
                    $("#email").html('');
                    
                } else {
                  $("#messageEmail").html('');

                  $("#email").hide();
                  $(".email_div").hide();
                    $(".otp_email_div").show();

                    $("#messageEmail").html('Enter the 6-digit OTP Code that was sent to your email');
                }

                setTimeout(function() {
                    $("#messageEmail").fadeOut(1000); // Fade out the message after 5 seconds (1000ms = 1 second)
                }, 3000);
                
            },
            error: function(xhr, status, error) {
                // Handle error cases if needed
                console.error(xhr.responseText);
                $("#messageEmail").html('This email is already Verified.Please try with different email.');
                setTimeout(function() {
                    $("#messageEmail").fadeOut(1000); // Fade out the message after 5 seconds (1000ms = 1 second)
                }, 3000);
            }
        });
    } else {
        $("#messageEmail").show();
        $("#messageEmail").html('Please enter a valid email.');
        setTimeout(function() {
            $("#messageEmail").fadeOut(1000); // Fade out the message after 5 seconds (1000ms = 1 second)
        }, 3000);
    }
});

   
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#verifybtnEmail").click(function() {
     
        $("#messageEmail").show();
        $("#messageEmail").html('');

        var otp = $("#combinedOtpEmail").val();
        console.log('OTP:', otp); // Log OTP value for debugging
        var uuid = $("#uuidEmail").val();
        if (!otp.trim()) {
        // If OTP is empty or only whitespace characters, show an error message
        $("#messageEmail").html('Please enter the one-time password.');
        $("#messageEmail").html('');

        return false; // Prevent further execution of the function
    }
        $.ajax({
            url: '/verifyCodeEmail',
            type: 'POST',
            data: {_token: CSRF_TOKEN, otp: otp, uuid: uuid},
            dataType: 'JSON',
            success: function (data) { 
                $("#messageEmail").html('Your Email has been verified successfully.Please enter your name amd password for complete the registration process.');
                $(".password_div").show();

                // $("#message").html('Please see your email for activation link.');
                $("#otp_1_email").val('');
                  $("#otp_2_email").val('');
                        $('#otp_2_email').attr('disabled', true);

                  $("#otp_3_email").val('');
                        $('#otp_3_email').attr('disabled', true);

                  $("#otp_4_email").val('');
                        $('#otp_4_email').attr('disabled', true);

                  $("#otp_5_email").val('');
                        $('#otp_5_email').attr('disabled', true);

                  $("#otp_6_email").val('');
                        $('#otp_6_email').attr('disabled', true);

                $(".otp_email_div").hide();

                setTimeout(function() {
                $("#messageEmail").fadeOut(1000); // Fade out the message after 5 seconds (1000ms = 1 second)
            }, 3000);
                
            },
            error: function (xhr, status, error) {
                // Handle error cases if needed
                $(".otp-digit-email").val('');

                $("#messageEmail").html('Incorrect verfication code');

                var response = xhr.responseJSON;
            if (response && responsmessageEmaile.message) {
                $("#messageEmail").html(response.message);
            } else {
                $("#messageEmail").html('An error occurred while verifying the code.');
            }
            }
        }); 
    });
});

    </script> 
   
     <script>
    //resend email code
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).on('click', '#resend_otp_email', function() {
    $("#messageEmail").show();
    $("#sign_up").hide();
    var email = $("#email").val();
    $.ajax({
      url: '/otp/email',
      type: 'POST',
      data: {_token: CSRF_TOKEN, email: email},
      dataType: 'JSON',
      success: function (data) {
        $("#uuidEmail").val(data.id);
        $('option:not(:selected)').attr('disabled', true);
        $("#email").prop("readonly", true);
        $("#otp_1_email").val('');
                  $("#otp_2_email").val('');
                        $('#otp_2_email').attr('disabled', true);

                  $("#otp_3_email").val('');
                        $('#otp_3_email').attr('disabled', true);

                  $("#otp_4_email").val('');
                        $('#otp_4_email').attr('disabled', true);

                  $("#otp_5_email").val('');
                        $('#otp_5_email').attr('disabled', true);

                  $("#otp_6_email").val('');
                        $('#otp_6_email').attr('disabled', true);
        $(".otp_email_div").show();
        $(".email_div").hide();
        $("#messageEmail").html('OTP is resent. Please Enter the 6-digit OTP Code that was sent to your email');
        setTimeout(function() {
          $("#messageEmail").fadeOut(1000);
        }, 3000);
      },
      error: function (xhr, status, error) {
        $(".otp-digit-email").val('');
        var response = xhr.responseJSON;
        if (response && response.message) {
          $("#messageEmail").html(response.message);
        } else {
          $("#messageEmail").html('An error occurred while verifying the code.');
        }
      }
    });
  });
    </script>
     <script>
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function(){
      // AJAX request when Submit button is clicked
      $('#submitRegister').click(function(){
        // Retrieve form data
        $("#message").html('');

        $("#message").show();
   
        var name = $('input[name="name"]').val();
        var password = $("#password").val();
        var email = $("#email").val();
        var country_code = $("#country_code").val();
        var phone_number = $("#phone").val();
        phone  = phone_number.replace(/[^a-zA-Z0-9]/g, '');
             if (name.trim() === '') {
            $("#message").html('Please enter your name.');
            return false; // Prevent further execution
        }

        if (password.trim() === '') {
            $("#message").html('Please enter your password.');
            return false; // Prevent further execution
        }
        // AJAX POST request
        $.ajax({
          url: 'store', 
          type: 'POST',
          data: { _token: CSRF_TOKEN,name: name, password: password,email:email,country_code:country_code,phone:phone },
          success: function(response){
            // Handle success response
            $("#message").html('Form submitted successfully.');
            $("#message").html('');
            $(".password_div").hide();
            $("#thankyou_div").show();

            // Optionally, you can redirect the user or perform other actions here
          },
          error: function(xhr, status, error){
            // Handle error response
            $("#message").html('Email or phone number already registred.');

          }
        });
      });
    });
  </script>
<script>

    captcha();

    function captcha() {
      const captchaTable = document.getElementById('captchaTable');
      const captchaInput = document.getElementById('captchaInput');
      const refreshButton = document.getElementById('refreshButton');
      const verifyButton = document.getElementById('submitPhone');
      const resultMessage = document.getElementById('message');
      const phoneNumberInput = document.getElementById('phone'); 
      // Generate the initial Captcha
      generateCaptchaTable();

      // Event listener for the Refresh button
      refreshButton.addEventListener('click', function () {
        generateCaptchaTable();
        resultMessage.textContent = '';
      });

      // Event listener for the Verify button
      verifyButton.addEventListener('click', function () {
        // verifyButton.disabled = true;
        const inputText = captchaInput.value.trim().toLowerCase();
        const captchaText = captchaTable.dataset.captcha.trim().toLowerCase();
        const phoneNumber = phoneNumberInput.value.replace(/[^a-zA-Z0-9]/g, '');
            // Check if phone number is empty or less than 10 digits
    if (phoneNumber === '') {
      resultMessage.textContent = 'Please enter  Phone Number.';
      resultMessage.classList.remove('text-green-500');
      resultMessage.classList.add('text-red-500');
      return; // Stop further execution
    }
    else if( phoneNumber.length < 10){
      resultMessage.textContent = 'Please enter a valid 10-digit Phone Number.';
      resultMessage.classList.remove('text-green-500');
      resultMessage.classList.add('text-red-500');
      return; // Stop further execution
    }

  // Check if Captcha is empty
  if (inputText === '') {
      resultMessage.textContent = 'Please enter the Captcha.';
      resultMessage.classList.remove('text-green-500');
      resultMessage.classList.add('text-red-500');
      return; // Stop further execution
    }
        // Verify the entered Captcha
        if (inputText === captchaText) {
          resultMessage.textContent = 'Captcha verified successfully.';
          resultMessage.classList.remove('text-red-500');
          resultMessage.classList.add('text-green-500');
          // Proceed with form submission
          submitForm();
        } else {
          resultMessage.textContent = 'Incorrect Captcha. Please try again.';
          resultMessage.classList.remove('text-green-500');
          resultMessage.classList.add('text-red-500');
          captchaInput.value = ''; // Clear the input field
          generateCaptchaTable(); // Regenerate Captcha
        }
      });

      // Function to generate a random string for the Captcha
      function generateRandomString(length) {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        for (let i = 0; i < length; i++) {
          result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        return result;
      }

      // Function to generate the Captcha table
      function generateCaptchaTable() {
        const captchaText = generateRandomString(6);
        captchaTable.dataset.captcha = captchaText;
        captchaTable.innerHTML = '';
        for (let i = 0; i < captchaText.length; i++) {
          const cell = document.createElement('div');
          cell.textContent = captchaText.charAt(i);
          cell.classList.add();
          captchaTable.appendChild(cell);
        }
      }

      // Function to handle form submission
      function submitForm() {
        var country_code = $("#country_code").val();
        var phone = $("#phone").val();
        phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');

        if (phone_number.length < 10) {
          $("#message").show();
          $("#message").html('Please enter a 10-digit Phone Number.');
          $('#message').delay(5000).fadeOut('slow');
          return false;
        } else 
        {
          // Start timer for 60 seconds
        startTimer(60, document.getElementById('timer'));
          $.ajax({
            url: 'signup/otp/phone',
            type: 'POST',
            data: {_token: CSRF_TOKEN, country_code: country_code, phone_number: phone_number},
            dataType: 'JSON',
            success: function (data) {
              number = data.phone_number;
              var masking_number = number.replace(/.(?=.{4})/g, 'X');
              $("#uuid").val(data.id);
              //$('option:not(:selected)').attr('disabled', true);
              $("#phone").prop("readonly", false);
              $("#uuid").prop("readonly", true);
              if (data.status == 'Verified') {
                $(".otp_div").hide();
                $(".phn_div").show();
                $(".email_div").hide();
                $("#message").html('Your number ' + masking_number + ' is Already Verified');
              } else {

                $(".otp_div").show();
                $(".phn_div").hide();
                $("#phn_no").hide();

                
                $("#message").html('Enter the 6-digit OTP Code that was sent to your number ' + masking_number + '.');
              }
              $("#message").show();
              
              captcha();
            },
            error: function () {
           
              $("#message").show();
              $("#message").html('Phone number already verified.Please try with differnt numbers');
              $('#message').delay(5000).fadeOut('slow');
              captcha();
            }
          });
        }
      }
      
    };
    function startTimer(duration, display) {
      var timer = duration, minutes, seconds;
      timerInterval = setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        display.textContent = minutes + ':' + seconds;

        if (--timer < 0) {
          clearInterval(timerInterval);
          $('#timer').text('');
          $('#time_left').hide();
          $('#resend_otp').removeClass('disabled');
        }
      }, 1000);
    }
  </script>
 <script>
    //resend phone code
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// Event listener for the resend button
$(document).on('click', '#resend_otp', function() {
    $("#message").show();
    $("#message").html('');

    var country_code = $("#country_code").val();
    var phone = $("#phone").val();
    phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');

    if (phone_number.length > 9) {
      $.ajax({
        url: '/signup/otp/phone',
        type: 'POST',
        data: {_token: CSRF_TOKEN, country_code: country_code, phone_number: phone_number},
        dataType: 'JSON',
        success: function (data) { 
          number = data.phone_number;
          var masking_number = number.replace(/.(?=.{4})/g, 'X');
          $("#uuid").val(data.id);
          $('option:not(:selected)').attr('disabled', true);
          $("#phone").prop("readonly", true);
          $("#uuid").prop("readonly", true);
          $("#otp_1").val('');
         $("#otp_2").val('');
              $('#otp_2').attr('disabled', true);

         $("#otp_3").val('');
              $('#otp_3').attr('disabled', true);

         $("#otp_4").val('');
              $('#otp_4').attr('disabled', true);

         $("#otp_5").val('');
              $('#otp_5').attr('disabled', true);

         $("#otp_6").val('');
              $('#otp_6').attr('disabled', true);
          $(".otp_div").show();
          $("#otp_div").hide();
          $(".phone_div").hide();
          $("#message").show();
          $("#message").html('OTP is resent. Please enter the 6-digit OTP Code that was sent to your number ' + masking_number + '.');
        },
        error: function (xhr, status, error) {
          $(".otp-digit").val('');
          var response = xhr.responseJSON;
          if (response && response.message) {
            $("#message").html(response.message);
          } else {
            $("#message").html('An error occurred while verifying the code.');
          }
        }
      }); 
    } else {
      $("#message").show();
      $("#message").html('Please enter a 10-digit Phone Number.');
      $('#message').delay(5000).fadeOut('slow');
      return false;
    }
  });
  
    </script>

</body>

</html>