

$(document).ready(function(){


    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


      var timerStarted = false;
      var timerStartedReset = false;

        var checked = 1;


          function countdownReset() {

            alert(timerStartedReset);
            if (timerStartedReset) {
            return; // If the timer has already started, exit the function
        }

        var secondsReset = 60;

        function tickReset() {
            var counter = document.getElementById("timer_reset");
            secondsReset--;
            counter.innerHTML = "0:" + (secondsReset < 10 ? "0" : "") + String(secondsReset);

            if (secondsReset > 0) {
                setTimeout(tickReset, 1000);
            } 
            else {
                    $("#resend_otp_reset").removeClass("disabled");


                var uuid_otp_verify = $("#uuid_otp_verify").val();
                if(uuid_otp_verify == "")
                {


               // $("#hideResend").show();
            }
            else
           

                $("#submit_registration").hide();

                counter.innerHTML = "";
                $("#time_left_reset").hide();
                $("#hideResend").show();
                if(checked == 2)
                {

                    $("#whatsapp_link").show();
                    $("#resend_otp_reset").hide();


                }
        timerStartedReset = false; // Set the flag to indicate that the timer has started
        checked = 2; // Set the flag to indicate that the timer has started




            

            }
        }

        tickReset();
        timerStartedReset = true; // Set the flag to indicate that the timer has started
    }

        function countdown() {
            if (timerStarted) {
            return; // If the timer has already started, exit the function
        }

        var seconds = 60;

        function tick() {
            var counter = document.getElementById("timer");
            seconds--;
            counter.innerHTML = "0:" + (seconds < 10 ? "0" : "") + String(seconds);

            if (seconds > 0) {
                setTimeout(tick, 1000);
            } 
            else {
                    $("#resend_otp").removeClass("disabled");


                var uuid_otp_verify = $("#uuid_otp_verify").val();
                if(uuid_otp_verify == "")
                {


               // $("#hideResend").show();
            }
            else
           

                $("#submit_registration").hide();

                counter.innerHTML = "";
                $("#time_left").hide();
                $("#time_left_message").hide();
                $("#hideResend").show();
                if(checked == 2)
                {

                    $("#whatsapp_link").show();
                    $("#resend_otp").hide();


                }
        timerStarted = false; // Set the flag to indicate that the timer has started
        checked = 2; // Set the flag to indicate that the timer has started




            

            }
        }

        tick();
        timerStarted = true; // Set the flag to indicate that the timer has started
    }

  $("#resend_otp_reset").click(function()
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
            url: '/otp/phone/reset',
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

              //$(".otp_div").show();
              $("#otp_div").hide();
              $(".reset_ai_otp_div").show();
              $("#otp_div_reset_ai").hide();



              $(".phone_div").hide();
        $("#message").show();


              $("#message").html('OTP is resends, Please Enter the 6-digit OTP Code that was sent to your number '+masking_number+'.');
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

       $("#reset_ai").click(function(){


        var country_code = $("#country_code").val();
        var phone = $("#phone").val();
        phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');

        //alert(country_code);
        //alert(phone_number);




        $.ajax({
            url: '/otp/phone/reset',
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
              /*if(data.status == 'Verified')
              {

                $(".reset_ai_otp_div").show();
              $(".phone_div").hide();
              $(".reset_ai_form").hide();

              $("#message").html('Your number '+masking_number+' is Already Verified. Do you want to Reset the AI Demo?.Please click to below button');
              }
              else
              {*/

              $(".reset_ai_form").hide();

                $("#message").html('');
                $("#otp_div_reset_ai").show();

              $(".otp_div").hide();


                 //$("#reset_ai").show();

                 $("#reset_ai_otp_div").show();
                 $(".reset_ai_otp_div").show();

              $(".phone_div").hide();
              $("#message").html('Enter the 6-digit OTP Code that was sent to your number '+masking_number+'.');
              //}




              
        $("#message").show();



              //$('#message').delay(5000).fadeOut('slow');

       countdownReset();
   // captcha();




            }
          }); 

       });

$("#submitPhone").click(function()
      {
        var country_code = $("#country_code").val();
        var phone = $("#phone").val();
        phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');

        var name = $("#name").val();

        //alert(phone_number.length);

          captchaInput = $("#captchaInput").val();
          var captchaInputImage = $("#captchaTable").text();

         
          if(!name) {
    $("#message").html('Please enter your valid Name');
    $('#message').delay(5000).fadeOut('slow');
    $("#message").show();
    return false;
  }



        
       else
          if(phone_number.length < 10)
        
          {
              $("#message").show();

            $("#message").html('Please enter 10 digits Phone Number.');
          $('#message').delay(5000).fadeOut('slow');

          return false;
          }

           
          
        else  
          if(!captchaInput)
          {
              $("#message").show();

            $("#message").html('Please enter the captcha value');
          $('#message').delay(5000).fadeOut('slow');

          return false;
          }

         else if(captchaInput == captchaInputImage)
          {

             if(phone_number.length > 9)
        {
          $.ajax({
            url: '/otp/phone',
            type: 'POST',
            data: {_token: CSRF_TOKEN, country_code:country_code,phone_number:phone_number,name:name},
            dataType: 'JSON',
            success: function (data) { 

              number = data.phone_number;
              var masking_number = number.replace(/.(?=.{4})/g, 'X');
              $("#uuid").val(data.id);
              $('option:not(:selected)').attr('disabled', true);
              $("#phone").prop("readonly", true);
              $("#uuid").prop("readonly", true);
              if(data.status == 'Verified')
              {
$(".otp_div").hide();
              $(".phone_div").hide();
              $(".reset_ai_form").show();

              $("#message").html('Your number '+masking_number+' is Already Verified. Do you want to Reset the AI Demo?.Please click to below button');
              }
              else
              {
                $("#message").html('');

                $(".otp_div").show();
              $(".phone_div").hide();
              $("#message").html('Enter the 6-digit OTP Code that was sent to your number '+masking_number+'.');

                  countdown();
    captcha();
              }




              
        $("#message").show();



              //$('#message').delay(5000).fadeOut('slow');

   




            }
          }); 
        }
          }
          else
          {

        $("#message").show();

            $("#message").html("Captcha doesn't match");
          $('#message').delay(5000).fadeOut('slow');
    captcha();

          return false;
          }

         
      
      });



$("#personal_details").click(function() {
  var phone = $("#phone").val();
  var phone_number = phone.replace(/[^a-zA-Z0-9]/g, '');
  var email = $("#email").val();
  var name = $("#name").val();
  var uuid = $("#uuid").val();

  if(!email) {
    $("#message").html('Please enter your valid email Id');
    $('#message').delay(5000).fadeOut('slow');
    $("#message").show();
    return false;
  }


  var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

   if(!emailReg.test(email)) {  
        alert("Please enter valid email id");
        return false;
   }     

 

  $.ajax({
    url: '/phone/personal-details',
            type: 'POST',
            data: {_token: CSRF_TOKEN, phone_number:phone_number,email:email,name:name},
            dataType: 'JSON',
            success: function (data) { 

              $("#message").html('Thank You');
        $("#message").show();

              // document.write("You will be redirected to a new page in 5 seconds"); 
    setTimeout('Redirect()', 5000);   










            }
          }); 



      });


  $("#reset_ai_verify").click(function()
      {
        alert();

      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var otp_1 = $("#otp_1_reset").val();
        var otp_2 = $("#otp_2_reset").val();
        var otp_3 = $("#otp_3_reset").val();
        var otp_4 = $("#otp_4_reset").val();
        var otp_5 = $("#otp_5_reset").val();
        var otp_6 = $("#otp_6_reset").val();

        alert(otp_6);



        if(otp_1 == '' || otp_2 == '' || otp_3 == '' || otp_4 == '' || otp_5 == '' || otp_6 == '')
        {
          $("#message_otp").show();
          $("#message_otp").html("Please enter the one time password");
          $('#message_otp').delay(5000).fadeOut('slow');
          return false;

        }

        else
        {

          var otp_code = otp_1+otp_2+otp_3+otp_4+otp_5+otp_6;
          var otpId = $("#uuid").val();
          var reset = 1;
          alert(otp_code);
          $.ajax({
            url: '/otp/phone/verify',
            type: 'POST',
            data: {_token: CSRF_TOKEN, code:otp_code,otpId:otpId,reset:reset},
            dataType: 'JSON',
            success: function (data) { 

              if(data.status == 'Expired')
              {

                $("#otp_1_reset").val('');
         $("#otp_2_reset").val('');
              $('#otp_2_reset').attr('disabled', true);

         $("#otp_3_reset").val('');
              $('#otp_3_reset').attr('disabled', true);

         $("#otp_4_reset").val('');
              $('#otp_4_reset').attr('disabled', true);

         $("#otp_5_reset").val('');
              $('#otp_5_reset').attr('disabled', true);

         $("#otp_6_reset").val('');
              $('#otp_6_reset').attr('disabled', true);
                $("#message").html('one time password is expired! Please try again');
        $("#message").show();
              $('#message').delay(5000).fadeOut('slow');
                $("#message").html('');

              }

               else
                if(data.status == 'Failed')
              {

                $("#otp_1_reset").val('');
         $("#otp_2_reset").val('');
              $('#otp_2_reset').attr('disabled', true);

         $("#otp_3_reset").val('');
              $('#otp_3_reset').attr('disabled', true);

         $("#otp_4_reset").val('');
              $('#otp_4_reset').attr('disabled', true);

         $("#otp_5_reset").val('');
              $('#otp_5_reset').attr('disabled', true);

         $("#otp_6_reset").val('');
              $('#otp_6_reset').attr('disabled', true);

                $("#message").html('');

                $("#message").html('one time password is invalid! Please try again');
        $("#message").show();
              $('#message').delay(5000).fadeOut('slow');

              }
              else
              {
                $("#message").html('');
                $("#message").html('one time password is verified');
                $("#message").show();
                $('#message').delay(5000).fadeOut('slow');


                $(".otp_div").hide();
              $("#otp_div").hide();

              $(".phone_div").hide();
              $(".email_div").show();
              $(".reset_ai_otp_div").hide();


              $("#result_message").html('We have Re-initiated an AI conversation with the mobile number you have verified.');
              }

             










            }
          }); 
        }


      });



      $("#verify_otp").click(function()
      {

      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var otp_1 = $("#otp_1").val();
        var otp_2 = $("#otp_2").val();
        var otp_3 = $("#otp_3").val();
        var otp_4 = $("#otp_4").val();
        var otp_5 = $("#otp_5").val();
        var otp_6 = $("#otp_6").val();


        if(otp_1 == '' || otp_2 == '' || otp_3 == '' || otp_4 == '' || otp_5 == '' || otp_6 == '')
        {
          $("#message_otp").show();
          $("#message_otp").html("Please enter the one time password");
          $('#message_otp').delay(5000).fadeOut('slow');
          return false;

        }

        else
        {

          var otp_code = otp_1+otp_2+otp_3+otp_4+otp_5+otp_6;
          var otpId = $("#uuid").val();
          //alert(otp_code);
          $.ajax({
            url: '/otp/phone/verify',
            type: 'POST',
            data: {_token: CSRF_TOKEN, code:otp_code,otpId:otpId},
            dataType: 'JSON',
            success: function (data) { 

              if(data.status == 'Expired')
              {

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
                $("#message").html('one time password is expired! Please try again');
        $("#message").show();
              $('#message').delay(5000).fadeOut('slow');
                $("#message").html('');

              }

               else
                if(data.status == 'Failed')
              {

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

                $("#message").html('');

                $("#message").html('one time password is invalid! Please try again');
        $("#message").show();
              $('#message').delay(5000).fadeOut('slow');

              }
              else
              {
                $("#message").html('');
                $("#message").html('one time password is verified');
        $("#message").show();
              $('#message').delay(5000).fadeOut('slow');


                $(".otp_div").hide();
              $("#otp_div").hide();

              $(".phone_div").hide();
              $(".email_div").show();

              $("#result_message").html('We have initiated an AI conversation with the mobile number you have verified.');
              }

             










            }
          }); 
        }


      });
     });

function Redirect() 
    {  
        window.location="/sms/chat/demo"; 
    } 
   


 var phoneInput = document.getElementById('phone');
    var phoneMask = new IMask(phoneInput, {
      mask: '(000) 000-0000'
    }); 


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
