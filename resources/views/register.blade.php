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

	<style>
		
		@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
	font-family: 'Montserrat', sans-serif;
}

body,
input {
  font-family: 'Montserrat', sans-serif;
}

.container {
  position: relative;
  width: 100%;
  background-color: #fff;
  min-height: 100vh;
  overflow: hidden;
}

.forms-container {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

.signin-signup {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  left: 75%;
  width: 50%;
  transition: 1s 0.7s ease-in-out;
  display: grid;
  grid-template-columns: 1fr;
  z-index: 5;
}

form {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0rem 5rem;
  transition: all 0.2s 0.7s;
  overflow: hidden;
  grid-column: 1 / 2;
  grid-row: 1 / 2;
}

form.sign-up-form {
  opacity: 0;
  z-index: 1;
}

form.sign-in-form {
  z-index: 2;
}

.title {
  font-size: 2.2rem;
  color: #444;
  margin-bottom: 10px;
}

.input-field {
  max-width: 380px;
  width: 100%;
  background-color: #f0f0f0;
  margin: 10px 0;
  height: 55px;
  border-radius: 5px;
  display: grid;
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}

.input-field i {
  text-align: center;
  line-height: 55px;
  color: #acacac;
  transition: 0.5s;
  font-size: 1.1rem;
}

.input-field input {
  background: none;
  outline: none;
  border: none;
  line-height: 1;
  font-weight: 600;
  font-size: 1.1rem;
  color: #333;
}

.input-field input::placeholder {
  color: #aaa;
  font-weight: 500;
}

.social-text {
  padding: 0.7rem 0;
  font-size: 1rem;
}

.social-media {
  display: flex;
  justify-content: center;
}

.social-icon {
  height: 46px;
  width: 46px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 0.45rem;
  color: #333;
  border-radius: 50%;
  border: 1px solid #333;
  text-decoration: none;
  font-size: 1.1rem;
  transition: 0.3s;
}

.social-icon:hover {
  color: #F86F03;
  border-color: #F86F03;
}

.btn {
  width: 150px;
  background-color: #F86F03;
  border: none;
  outline: none;
  height: 49px;
  border-radius: 4px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  margin: 10px 0;
  cursor: pointer;
  transition: 0.5s;
}

.btn:hover {
  background-color: #f98c39;
}
.panels-container {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.container:before {
  content: "";
  position: absolute;
  height: 2000px;
  width: 2000px;
  top: -10%;
  right: 48%;
  transform: translateY(-50%);
  background-image: linear-gradient(-45deg, #F86F03 0%, #FFA41B 100%);
  transition: 1.8s ease-in-out;
  border-radius: 50%;
  z-index: 6;
}

.image {
  width: 100%;
  transition: transform 1.1s ease-in-out;
  transition-delay: 0.4s;
}

.panel {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: space-around;
  text-align: center;
  z-index: 6;
}

.left-panel {
  pointer-events: all;
  padding: 3rem 17% 2rem 12%;
}

.right-panel {
  pointer-events: none;
  padding: 3rem 12% 2rem 17%;
}

.panel .content {
  color: #fff;
  transition: transform 0.9s ease-in-out;
  transition-delay: 0.6s;
}

.panel h3 {
  font-weight: 600;
  line-height: 1;
  font-size: 1.5rem;
}

.panel p {
  font-size: 0.95rem;
  padding: 0.7rem 0;
}

.btn.transparent {
  margin: 0;
  background: none;
  border: 2px solid #fff;
  width: 130px;
  height: 41px;
  font-weight: 600;
  font-size: 0.8rem;
}

.right-panel .image,
.right-panel .content {
  transform: translateX(800px);
}

/* ANIMATION */

.container.sign-up-mode:before {
  transform: translate(100%, -50%);
  right: 52%;
}

.container.sign-up-mode .left-panel .image,
.container.sign-up-mode .left-panel .content {
  transform: translateX(-800px);
}

.container.sign-up-mode .signin-signup {
  left: 25%;
}

.container.sign-up-mode form.sign-up-form {
  opacity: 1;
  z-index: 2;
}

.container.sign-up-mode form.sign-in-form {
  opacity: 0;
  z-index: 1;
}

.container.sign-up-mode .right-panel .image,
.container.sign-up-mode .right-panel .content {
  transform: translateX(0%);
}

.container.sign-up-mode .left-panel {
  pointer-events: none;
}

.container.sign-up-mode .right-panel {
  pointer-events: all;
}

@media (max-width: 870px) {
  .container {
    min-height: 800px;
    height: 100vh;
  }
  .signin-signup {
    width: 100%;
    top: 95%;
    transform: translate(-50%, -100%);
    transition: 1s 0.8s ease-in-out;
  }

  .signin-signup,
  .container.sign-up-mode .signin-signup {
    left: 50%;
  }

  .panels-container {
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 2fr 1fr;
  }

  .panel {
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    padding: 2.5rem 8%;
    grid-column: 1 / 2;
  }

  .right-panel {
    grid-row: 3 / 4;
  }

  .left-panel {
    grid-row: 1 / 2;
  }

  .image {
    width: 200px;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.6s;
  }

  .panel .content {
    padding-right: 15%;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.8s;
  }

  .panel h3 {
    font-size: 1.2rem;
  }

  .panel p {
    font-size: 0.7rem;
    padding: 0.5rem 0;
  }

  .btn.transparent {
    width: 110px;
    height: 35px;
    font-size: 0.7rem;
  }

  .container:before {
    width: 1500px;
    height: 1500px;
    transform: translateX(-50%);
    left: 30%;
    bottom: 68%;
    right: initial;
    top: initial;
    transition: 2s ease-in-out;
  }

  .container.sign-up-mode:before {
    transform: translate(-50%, 100%);
    bottom: 32%;
    right: initial;
  }

  .container.sign-up-mode .left-panel .image,
  .container.sign-up-mode .left-panel .content {
    transform: translateY(-300px);
  }

  .container.sign-up-mode .right-panel .image,
  .container.sign-up-mode .right-panel .content {
    transform: translateY(0px);
  }

  .right-panel .image,
  .right-panel .content {
    transform: translateY(300px);
  }

  .container.sign-up-mode .signin-signup {
    top: 5%;
    transform: translate(-50%, 0);
  }
}

@media (max-width: 570px) {
  form {
    padding: 0 1.5rem;
  }

  .image {
    display: none;
  }
  .panel .content {
    padding: 0.5rem 1rem;
  }
  .container {
    padding: 1.5rem;
  }

  .container:before {
    bottom: 72%;
    left: 50%;
  }

  .container.sign-up-mode:before {
    bottom: 28%;
    left: 50%;
  }
}
	</style>
</head>

<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
				<form action="{{url('storeLogin')}}" class="sign-in-form"method="post">
          @csrf         
					<h2 class="title phn_div">Sign in</h2>
          
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
				<form action=""class="sign-up-form">
                    
					<h2 class="title phn_div"id="sign_up">Sign up</h2>
          <h2 class="title otp_div"style="display:none;" >Verify OTP</h2>

          <span style="line-height: 3;"  class="" id="message"></span>


          <input type="hidden" id="uuid"  />


          <div class="row justify-content-center otp_div" style="display: none;">
          <div class="col-12 col-md-6 col-lg-4">
          <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
          <div class="card-body p-5 text-center">


          <div class="otp-field mb-4">
          <input type="number" name="digit1" class="otp-digit" />
    <input type="number" name="digit2" class="otp-digit" disabled />
    <input type="number" name="digit3" class="otp-digit" disabled />
    <input type="number" name="digit4" class="otp-digit" disabled />
    <input type="number" name="digit5" class="otp-digit" disabled />
    <input type="number" name="digit6" class="otp-digit" disabled />
          </div>
<!-- Hidden input field to store combined OTP digits -->
<input type="hidden" name="combined_otp" id="combinedOtp"val="" />
                    <input type="button" value="Submit" style="display:none;" id="" class="btn solid" />


          </div>
          </div>
          </div>
          </div>
          <h2 class="title otp_email_div" style="display:none;">Verify OTP</h2>

          <span style="line-height: 3;"  class="" id="messageEmail"></span>

          <input type="hidden" id="uuidEmail"  />



          <div class="row justify-content-center otp_email_div" style="display: none;">
          <div class="col-12 col-md-6 col-lg-4">
          <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
          <div class="card-body p-5 text-center">


          <div class="otp-field mb-4">
          <input type="number" name="digit1" class="otp-digit-email" />
          <input type="number" name="digit2" class="otp-digit-email" disabled />
          <input type="number" name="digit3" class="otp-digit-email" disabled />
          <input type="number" name="digit4" class="otp-digit-email" disabled />
          <input type="number" name="digit5" class="otp-digit-email" disabled />
          <input type="number" name="digit6" class="otp-digit-email" disabled />
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
          <!-- <div class="row justify-content-center email_div" style="display: none;">
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
              <div class="card-body p-5 text-center"> -->
                <span style="line-height: 3;"  class="" id="messageEmail"></span>
                <input type="hidden" id="uuidEmail"  />


                <div class="input-field email_div"style="display:none;">
                  <i class="fas fa-envelope"></i>
                  <input type="email" placeholder="Email"name="email"id="email"class="form-control"required />
                </div>
                <input type="button" value="Submit" id="submitEmail" class="btn solid email_div" style="display:none;" />

              <!-- </div>
            </div>
          </div>
         </div> -->
					<div class="input-field phn_div">
            
          <i class="fas fa-globe"></i>
            <select type="text" class="form-control select" id="country_code"   placeholder="Username" >
              <option value="91">India</option>
              <option value="1">USA</option>
              <option value="1">Canada</option>
            </select>
					</div>
          <div class="input-field phn_div">
            <i class="fas fa-phone"></i>
            <input type="text" id="phone" autocomplete="nope" autocomplete="off" placeholder="Phone Number" />
          </div>
		
				
          <input type="button" value="Submit" id="submitPhone" class="btn solid phn_div" />

          <input type="button" value="Verify" id="verifybtn"class="btn solid otp_div" style="display:none;" />
          <input type="button" value="Verify" id="verifybtnEmail" class="btn solid otp_email_div" style="display:none;" />


          <p class="resend text-muted mb-0 otp_div" id="otp_div" style="display:none;">
              <span id="time_left" >Time Left : <span id="timer"></span></span>

              Didn't receive code? <a type="button"id="resend_otp" class="disabled" href="javascript:0">Resend</a>
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

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>New here ?</h3>
					<p>
						Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
						ex ratione. Aliquid!
					</p>
					<button class="btn transparent" id="sign-up-btn">
						Sign up
					</button>
				</div>
				<img  src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h3>One of us ?</h3>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
						laboriosam ad deleniti.
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
    //phn verification
    $(document).ready(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var timerInterval; 
      $("#submitPhone").click(function()
      {
        $("#message").show();
        var country_code = $("#country_code").val();
        var phone = $("#phone").val();
        phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');
        var countdown = 15; // Seconds for the countdown
        timerInterval = setInterval(function() {
            $('#timer').text(countdown);
            countdown--;
            if (countdown < 0) {
                clearInterval(timerInterval); // Stop the timer
                $('#timer').text(''); // Clear the timer display
                $('#time_left').hide(); // Clear the timer display

                
                $('#resend_otp').removeClass('disabled'); // Enable the resend button
            }
        }, 1000); // Update the timer every second
        //alert(phone_number.length);
        if(phone_number.length > 9)
        {
          $.ajax({
            url: '/signup/otp/phone',
            type: 'POST',
            data: {_token: CSRF_TOKEN, country_code:country_code,phone_number:phone_number},
            dataType: 'JSON',
            success: function (data) { 

              number = data.phone_number;
              var masking_number = number.replace(/.(?=.{4})/g, 'X');
              $("#uuid").val(data.id);
              $('option:not(:selected)').attr('disabled', true);
              $("#phone").prop("readonly", true);

              $(".otp_div").show();
              $(".phn_div").hide();
              $("#message").html('Enter the 6-digit OTP Code that was sent to your number '+masking_number+'.');
              //$('#message').delay(5000).fadeOut('slow');




            }
          }); 
        }
        else
        {
          $("#message").html('Please enter 10 digits Phone Number.');
          $('#message').delay(5000).fadeOut('slow');
          return false;
        }
      });
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
        // Show the submit button if all OTP digits are filled
        if (combinedOtp.length === 6) {
            $("#verifybtn").show();
        } else {
            $("#verifybtn").hide();
        }
        console.log('Combined OTP:', combinedOtp); // Log combined OTP for debugging
    });

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#verifybtn").click(function() {
    $("#message").show();

    var otp = $("#combinedOtp").val();
    console.log('OTP:', otp); // Log OTP value for debugging
    var uuid = $("#uuid").val();

    $.ajax({
        url: '/verifyCode',
        type: 'POST',
        data: {_token: CSRF_TOKEN, otp: otp, uuid: uuid},
        dataType: 'JSON',
        success: function (data) { 
            $("#message").html('Your number has been verified successfully');
            $(".otp_div").hide();
            $(".email_div").show();
            $("#sign_up").show();
            setTimeout(function() {
                $("#message").fadeOut(1000); // Fade out the message after 5 seconds (1000ms = 1 second)
            }, 3000); // 3000ms = 3 seconds
        },
        error: function (xhr, status, error) {
            // Handle error cases if needed
            var response = xhr.responseJSON;
            if (response && response.message) {
                $("#message").html(response.message);
            } else {
                $("#message").html('An error occurred while verifying the code.');
            }
        }
    }); 
});

    //email verification

  
    $(".otp-digit-email").on('input', function() {
        var combinedOtp = '';
        $(".otp-digit-email").each(function() {
            combinedOtp += $(this).val();
        });
        $("#combinedOtpEmail").val(combinedOtp);
        // Show the submit button if all OTP digits are filled
        if (combinedOtp.length === 6) {
            $("#verifybtnEmail").show();
        } else {
            $("#verifybtnEmail").hide();
        }
        console.log('Combined OTP:', combinedOtp); // Log combined OTP for debugging
    });
    $(document).ready(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var timerInterval;

    $("#submitEmail").click(function() {
        var email = $("#email").val().trim(); // Trim to remove leading/trailing spaces

        if(email) {
            $("#messageEmail").show();
            $("#sign_up").hide();
            var countdown = 15; // Seconds for the countdown
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
                    $("#uuidEmail").val(data.id);
                    $('option:not(:selected)').attr('disabled', true);
                    $("#email").prop("readonly", true);

                    $(".otp_email_div").show();
                    $(".email_div").hide();
                    // $("#sign_up").show();

                    $("#messageEmail").html('Enter the 6-digit OTP Code that was sent to your email');

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
});
   
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $("#verifybtnEmail").click(function() {
     
        $("#message").show();
        $("#message").html('');

        var otp = $("#combinedOtpEmail").val();
        console.log('OTP:', otp); // Log OTP value for debugging
        var uuid = $("#uuidEmail").val();

        $.ajax({
            url: '/verifyCodeEmail',
            type: 'POST',
            data: {_token: CSRF_TOKEN, otp: otp, uuid: uuid},
            dataType: 'JSON',
            success: function (data) { 
                $("#message").html('Your Email has been verified successfully.Please see your email for activation link.');
                // $("#message").html('Please see your email for activation link.');

                $(".otp_email_div").hide();

           
                
            },
            error: function (xhr, status, error) {
                // Handle error cases if needed
                var response = xhr.responseJSON;
            if (response && response.message) {
                $("#message").html(response.message);
            } else {
                $("#message").html('An error occurred while verifying the code.');
            }
            }
        }); 
    });
});

    </script> 
    <script>
    //resend phone code
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("#resend_otp").click(function()
      {
        $("#message").show();
                $("#message").html('');

        var country_code = $("#country_code").val();
        var phone = $("#phone").val();
        phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');
        //alert(phone_number.length);
        if(phone_number.length > 9)
        {
          $.ajax({
            url: '/signup/otp/phone',
            type: 'POST',
            data: {_token: CSRF_TOKEN, country_code:country_code,phone_number:phone_number},
            dataType: 'JSON',
            success: function (data) { 

              number = data.phone_number;
              var masking_number = number.replace(/.(?=.{4})/g, 'X');
              $("#uuid").val(data.id);
              $('option:not(:selected)').attr('disabled', true);
              $("#phone").prop("readonly", true);
              $("#uuid").prop("readonly", true);

              $(".otp_div").show();
              $("#otp_div").hide();

              $(".phone_div").hide();
        $("#message").show();


              $("#message").html('OTP is resend, Please Enter the 6-digit OTP Code that was sent to your number '+masking_number+'.');
              //$('#message').delay(5000).fadeOut('slow');





            }
          }); 
        }
        else
        {
        $("#message").show();

          $("#message").html('Please enter 10 digits Phone Number.');
          $('#message').delay(5000).fadeOut('slow');
                $("#message").html('');

          return false;
        }
      });
    </script>
     <script>
    //resend email code
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("#resend_otp_email").click(function()
      {
        $("#messageEmail").show();
        $("#sign_up").hide();
       
        var email = $("#email").val();
        //alert(phone_number.length);
      
          $.ajax({
            url: '/otp/email',
            type: 'POST',
            data: {_token: CSRF_TOKEN, email:email},
            dataType: 'JSON',
            success: function (data) { 

              $("#uuidEmail").val(data.id);
              $('option:not(:selected)').attr('disabled', true);
              $("#email").prop("readonly", true);

              $(".otp_email_div").show();
              $(".email_div").hide();
              $("#messageEmail").html('OTP is resend Please Enter the 6-digit OTP Code that was sent to your email');
              //$('#message').delay(5000).fadeOut('slow');


              setTimeout(function() {
                $("#messageEmail").fadeOut(1000); // Fade out the message after 5 seconds (1000ms = 1 second)
            }, 3000); 

            }
          }); 
      
      });
    </script>
</body>

</html>