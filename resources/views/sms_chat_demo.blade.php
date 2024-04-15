<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <title>Sign in & Sign up Form</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{ asset('/web/css/sms_chat_demo.css')}}" />
</head>


<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form">
          <h2 class="title phone_div">Sign Up</h2>
          <h2 class="title otp_div" style="display:none;" >Verify OTP</h2>

            <span class="" id="message"></span>
            <br>
            <input type="hidden" class="form-control" id="uuid"  />


            <div class="row justify-content-center otp_div" style="display: none;">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-white mb-5 mt-5 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
                  <div class="card-body p-5 text-center">
                    <div class="otp-field mb-4">
                      <input type="number" />
                      <input type="number" disabled />
                      <input type="number" disabled />
                      <input type="number" disabled />
                      <input type="number" disabled />
                      <input type="number" disabled />
                    </div>

                    <input type="button" value="Submit" style="display:none;" id="" class="btn solid" />
                  </div>
                </div>
              </div>
            </div>

 

    

          <div class="input-field phone_div">
            <i class="fas fa-globe"></i>
            <select type="text" class="form-control select" id="country_code"   placeholder="Username" >
              <option value="91">India</option>
              <option value="1">USA</option>
              <option value="1">Canada</option>
            </select>
          </div>

          <div class="input-field phone_div">
            <i class="fas fa-phone"></i>
            <input type="text" id="phone" autocomplete="nope" autocomplete="off" placeholder="Phone Number" />
          </div>

        

          <input type="button" value="Submit" id="submitPhone" class="btn solid phone_div" />

             <input type="button" value="Verify" id="" class="btn solid otp_div" style="display:none;" />


            <p class="resend text-muted mb-0 otp_div" style="display:none;">
              Didn't receive code? <a id="resend_otp" href="javascript:0">Resend</a>
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
              <h3>Chat Demo ?</h3>
              <p>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                  ex ratione. Aliquid!
              </p>
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/imask"></script>
  <script>
    var phoneInput = document.getElementById('phone');
    var phoneMask = new IMask(phoneInput, {
      mask: '(000) 000-0000'
    }); 

  </script>

  <script>
    $(document).ready(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $("#submitPhone").click(function()
      {
        $("#message").show();
        var country_code = $("#country_code").val();
        var phone = $("#phone").val();
        phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');
        //alert(phone_number.length);
        if(phone_number.length > 9)
        {
          $.ajax({
            url: '/otp/phone',
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
              $(".phone_div").hide();
        $("#message").show();

              $("#message").html('Enter the 6-digit OTP Code that was sent to your number '+masking_number+'.');
              //$('#message').delay(5000).fadeOut('slow');




            }
          }); 
        }
        else
        {
        $("#message").show();

          $("#message").html('Please enter 10 digits Phone Number.');
          $('#message').delay(5000).fadeOut('slow');
          return false;
        }
      });

       $("#resend_otp").click(function()
      {
        $("#message").show();
        var country_code = $("#country_code").val();
        var phone = $("#phone").val();
        phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');
        //alert(phone_number.length);
        if(phone_number.length > 9)
        {
          $.ajax({
            url: '/otp/phone',
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

  

</body>

</html>