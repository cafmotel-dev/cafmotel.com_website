<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <title>AI Demo | Cafmotel Technology</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{ asset('/web/css/sms_chat_demo.css')}}" />
 
</head>


<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form">
          <h2 class="title phone_div">Enter Details for AI Demo</h2>
          <h2 class="title otp_div" style="display:none;" >Verify OTP</h2>
          <h2 class="title reset_ai_otp_div" style="display:none;" >Reset AI Demo</h2>



            <span class="" style="text-align: justify;" id="message"></span>
            <span class="" style="text-align: justify;" id="message_otp"></span>

            <br>
            <input type="hidden" class="form-control" id="uuid"  />


            <div class="row justify-content-center otp_div" style="display: none;">

              <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
                  <div class="card-body p-5 text-center">
                    <div class="otp-field mb-4">
                      <input type="number" id="otp_1" name="otp_1" />
                      <input type="number" id="otp_2" name="otp_2" disabled />
                      <input type="number" id="otp_3" name="otp_3" disabled />
                      <input type="number" id="otp_4" name="otp_4" disabled />
                      <input type="number" id="otp_5" name="otp_5" disabled />
                      <input type="number" id="otp_6" name="otp_6" disabled />
                    </div>

                    <input type="button" value="Submit" style="display:none;" id="" class="btn solid" />
                  </div>
                </div>
              </div>
            </div>


             <div class="row justify-content-center reset_ai_form" style="display: none;">

              <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
                  <div class="card-body p-5 text-center">
                    <div class="otp-field mb-4">
                      
                    </div>
                    <input type="button" value="Reset AI" style="display:none;" id="" class="btn solid" />
                  </div>
                </div>
              </div>
            </div>


               <div class="row justify-content-center reset_ai_otp_div" style="display: none;">

              <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
                  <div class="card-body p-5 text-center">
                    <div class="otp-field mb-4">
                      <input type="number" id="otp_1_reset" name="otp_1_reset" />
                      <input type="number" id="otp_2_reset" name="otp_2_reset" disabled />
                      <input type="number" id="otp_3_reset" name="otp_3_reset" disabled />
                      <input type="number" id="otp_4_reset" name="otp_4_reset" disabled />
                      <input type="number" id="otp_5_reset" name="otp_5_reset" disabled />
                      <input type="number" id="otp_6_reset" name="otp_6_reset" disabled />
                    </div>

                    <input type="button" value="Submit" style="display:none;" id="" class="btn solid" />
                  </div>
                </div>
              </div>
            </div>

<div class="thankyoucontent email_div" style="background: #F86F03;display:none" >
 <div class="wrapper-1">
    <div class="wrapper-2">
       <img src="https://i.ibb.co/Lkn7rkG/thank-you-envelope.png" alt="thank-you-envelope" border="0">
     <h1>Thank you!</h1>
      <p id="result_message"></p>
    
    </div>
   
   
</div>
</div>

           <!--  <span class="email_div" style="display: none;" id="">Please enter your email for activation link</span>

             <div class="input-field email_div" style="display: none;">
            <i class="fas fa-envelope"></i>
            <input type="text" id="email" autocomplete="nope" autocomplete="off" placeholder="Email" />

          </div>
           -->



 

  

          <div class="input-field phone_div" style="display: none;">
            <i class="fas fa-globe"></i>
            <select type="text" class="form-control select" id="country_code"   placeholder="Username" >
              <option value="1">USA & Canada</option>
            </select>
          </div>

           <div class="input-field phone_div">
            <i class="fas fa-user"></i>
            <input type="text" id="name"  placeholder="Name" />

          </div>
          <div class="input-field phone_div">
            <i class="fas fa-phone"></i>
            <input type="text" id="phone" autocomplete="nope" autocomplete="off" placeholder="Phone Number" />

          </div>


          <a id="captchaTable"
      class="flex justify-center social-icon phone_div" style="
    font-size: 20px;
    height: 25px;
    font-style: oblique;
    border: none;
    ">
    </a>

      <button id="refreshButton"
          class="bg-blue-500 text-white px-6 py-2 
            rounded-md focus:outline-none phone_div" style="background: #F86F03;
    border: none;
    border-radius: 37px;
    padding: 6px;
    color: white;
    cursor: pointer;
">
        Refresh Captcha <i class="fa fa-refresh" aria-hidden="true"></i>
      </button>

           <div class="input-field phone_div" >
          <i class="fa fa-refresh" aria-hidden="true"></i>

             <input type="text" id="captchaInput"
        class=""
        placeholder="Enter Captcha">
      <!-- Button to refresh the Captcha -->
            
          </div>
<!-- 
          <div class="social-media">
             <a id="captchaTable"
      class="flex justify-center social-icon" style="background: #F86F03;
    font-size: 30px;
    height: 35px;
    font-style: oblique;
    background-image: radial-gradient(black, transparent);">
    </a>
           
          </div> -->



                  

  
    <!-- Input field for user to enter the Captcha -->
   
            


          <input type="button" value="Submit" id="submitPhone" class="btn solid phone_div" />

             <input type="button" value="Verify" id="verify_otp" class="btn solid otp_div" style="display:none;" />

             <input type="button" value="Reset AI" id="reset_ai" class="btn solid reset_ai_form" style="display:none;" />

             <input type="button" value="Reset AI Verify" id="reset_ai_verify" class="btn solid reset_ai_otp_div" style="display:none;" />



             <!-- <input type="button" value="Submit" id="personal_details" class="btn solid email_div" style="display:none;" /> -->



            <p class="resend text-muted mb-0 otp_div" id="otp_div" style="display:none;">
              <span id="time_left" >Time Left : <span id="timer"></span></span>

              Didn't receive code? <a id="resend_otp" class="disabled" href="javascript:0">Resend</a>
            </p>

         

            <p class="resend text-muted mb-0 reset_ai_otp_div" id="otp_div_reset_ai" style="display:none;">
              <span id="time_left_reset" >Time Left : <span id="timer_reset"></span></span>

              Didn't receive code? <a id="resend_otp_reset" class="disabled" href="javascript:0">Resend</a>
            </p> 
          <div class="social-media">
          </div>
        </p>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
          <div class="content">
              <h3>AI Demo ?</h3>
              <p>
                  "Next-Level Messaging: AI-Powered SMS Enhancing Interaction and Productivity."
              </p>
          </div>
          <img  src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
      </div>
     
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/imask"></script>

<script src="{{ asset('/web/js/sms_chat_demo.js')}}"></script>



  <script>
    captcha();
   function captcha()
   {
      const captchaTable = document.getElementById('captchaTable');
      const captchaInput = document.getElementById('captchaInput');
      const refreshButton = document.getElementById('refreshButton');
      const verifyButton = document.getElementById('verifyButton');
      const resultMessage = document.getElementById('resultMessage');
      
      // Generate the initial Captcha
      generateCaptchaTable();
      
      // Event listener for the Refresh button
      refreshButton.addEventListener('click', function () {
        generateCaptchaTable();
        resultMessage.textContent = '';
      });
      
      // Event listener for the Verify button
      verifyButton.addEventListener('click', function () {
        const inputText = 
          captchaInput.value.trim().toLowerCase();
        const captchaText = 
          captchaTable.dataset.captcha.trim().toLowerCase();
        
        // Verify the entered Captcha
        if (inputText === captchaText) {
          resultMessage.textContent = 'Captcha verified successfully.';
          resultMessage.classList.remove('text-red-500');
          resultMessage.classList.add('text-green-500');
        } else {
          resultMessage.textContent = 'Incorrect Captcha. Please try again.';
          resultMessage.classList.remove('text-green-500');
          resultMessage.classList.add('text-red-500');
        }
        
        // Clear the input field and regenerate the Captcha
        captchaInput.value = '';
        generateCaptchaTable();
      });
      
      // Function to generate a random string for the Captcha
      function generateRandomString(length) {
        const characters = 
'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';
        for (let i = 0; i < length; i++) {
          result += 
          characters.charAt(Math.floor(Math.random() * 
                        characters.length));
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
    };
  </script>
 
  

</body>

</html>