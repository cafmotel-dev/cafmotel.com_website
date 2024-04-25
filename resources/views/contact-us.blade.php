@extends('web')
@section('title', 'Best VOIP Phone Services  | Cloud Phone System |Cloud PBX Providers| USA, CANADA')
@section('keywords',  ', Best Communication Platform, Cloud-based Business communication platform, Free Virtual Number Services, Toll Free Number, Smart IVR Services, Outbound Calling, E-Fax, Video &amp; Messaging Solutions, Virtual Number Solutions, Toll Free Number
Solutions, Outbound Calling Services.')
@section('description', ' is a leading and popular cloud business communications solution provider with cloud telephony-virtual number, toll free number, smart ivr services, outbound calling, video &amp; messaging solution, conferencing and so on.')


@section('content')
<style>
    .phn_div {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px; /* Adjust as needed */
}



    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Start Page Title Area -->
    <section class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h1>Contact Us</h1>
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
        <div class="shape8">
            <img src="{{ asset('/web/image/shape8.png')}}" alt="image" />
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Contact Info Area -->
   <section class="contact-info-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class="bx bx-envelope"></i>
                        </div>
                        <div class="icon">
                            <i class="bx bx-envelope"></i>
                        </div>
                        <h3>Emails</h3>
                        <p>Sales: <a href="mailto:sales@Cafmotel.com"><span>sales@cafmotel.com</span></a>
                        </p>
                        <p>Support: <a href="mailto:support@Cafmotel.com"><span>support@cafmotel.com</span></a></p>
                        <p>Partners: <a href="mailto:reseller@Cafmotel.com"> reseller@cafmotel.com</a></p>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class="bx bx-map"></i>
                        </div>
                        <div class="icon">
                            <i class="bx bx-map"></i>
                        </div>
                        <h3>Location</h3>

                        <p>169 Madison Ave STE 2945 New York, NY 10016</p>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="contact-info-box">
                        <div class="back-icon">
                            <i class='bx bx-time-five'></i>
                        </div>
                        <div class="icon">
                            <i class='bx bx-time-five'></i>
                        </div>
                        <h3>Hours of Operation</h3>
                        <p>Monday - Friday: 09:00 - 20:00</p>
                        <p>Sunday & Saturday: 10:30 - 22:00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Area -->

    <!-- Start Contact Area -->
    <section class="contact-area pb-100">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">Get in Touch</span>
                <h2>Ready to Get Started?<span class="overlay"></span></h2>
                <p>Your email address will not be published. Required fields are marked *</p>
            </div>
            <div id="msg" class="h3 text-center"></div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-image" data-tilt>
                        <img src="{{ asset('/web/image/contact.png')}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                   
                    <div class="contact-form">
                        <form  role="form">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                    <span id="nameMsg"style="color:red;"></span>

                                        <input type="text" name="name" class="form-control" id="name" required
                                            data-error="Please enter your name" placeholder="Your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                    <span id="emailMsg"style="color:red;"></span>

                                        <input type="email" name="email" class="form-control" id="email" required
                                            data-error="Please enter your email" placeholder="Your email address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <span id="phoneMsg"style="color:red;"></span>

                                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" type="text" name="phone" class="form-control" id="phone_number"
                                            required data-error="Please enter your phone number"
                                            placeholder="Your phone number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                    <span id="Msg"style="color:red;"></span>

                                        <textarea name="message" id="message" class="form-control" cols="30" rows="6"
                                            required data-error="Please enter your message"
                                            placeholder="Write your message..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                            <span id="msgCaptcha"style="color:red;"></span>


    <div class="col-lg-12 col-md-12">
    <div class="form-group d-flex align-items-center">
    <a id="captchaTable"
        class="flex justify-center text-white social-icon phn_div" style="
        font-size: 20px;
        height: 25px;
        font-style: oblique;
        border: none;
        margin-right:10px;
        background: #F86F03;
        border-radius: 37px; padding: 16px;
       
        ">
    </a>
        <button id="refreshButton" class="bg-blue-500 text-black rounded-md focus:outline-none ml-2"
                style=" border: none; border-radius: 37px; padding: 6px;
                color: black; cursor: pointer; margin-right:10px;">
         <i class="fa fa-refresh" aria-hidden="true"></i>
        </button>
        <input type="text" class="form-control" id="captchaInput" required
               data-error="Please enter captcha" placeholder="Enter Captcha">
               
            </div>
            
            <div class="help-block with-errors"></div>
</div>



                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" name="submit"id="submit" class="default-btn">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

    <!-- Start Map Area -->
    <div id="map">
        <!-- <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9476519598093!2d-73.99185268459418!3d40.74117737932881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a3f81d549f%3A0xb2a39bb5cacc7da0!2s175%205th%20Ave%2C%20New%20York%2C%20NY%2010010%2C%20USA!5e0!3m2!1sen!2sbd!4v1588746137032!5m2!1sen!2sbd"></iframe> -->
        <div class="mapouter">
            <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                    marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=169 Madison Ave STE 2945 New York, NY 10016&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            <!-- <a
                    href="https://www.kokagames.com/fnf-friday-night-funkin-mods/">FNF</a></div> -->



            <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    width: 100%;
                    height: 400px;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    width: 100%;
                    height: 400px;
                }

                .gmap_iframe {
                    height: 400px !important;
                }
            </style>
        </div>
    </div>
    <!-- End Map Area -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/imask"></script>
  <script>
    var phoneInput = document.getElementById('phone_number');
    var phoneMask = new IMask(phoneInput, {
      mask: '(000) 000-0000'
    }); 
</script>
<script>
    // Call the captcha function on page load
    captcha();

    function captcha() {
        const captchaTable = document.getElementById('captchaTable');
        const captchaInput = document.getElementById('captchaInput');
        const refreshButton = document.getElementById('refreshButton');
        const verifyButton = document.getElementById('submit');
        const resultMessage = document.getElementById('msgCaptcha');

        // Generate the initial Captcha
        generateCaptchaTable();

        // Event listener for the Refresh button
        refreshButton.addEventListener('click', function () {
            generateCaptchaTable();
            resultMessage.textContent = '';
        });

        // Event listener for the Verify button
        verifyButton.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent form submission
   // Get form data
   var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone_number').val();
        var message = $('#message').val();

        // Check if name is empty
        if (name.trim() === '') {
            $("#nameMsg").html('Please enter your name.');
            setTimeout(function () {
                $("#nameMsg").html('');
            }, 3000);
            return; // Stop form submission
        }

        // Check if email is empty and in valid format
        if (email.trim() === '' || !isValidEmail(email)) {
            if (email.trim() === '') {
                $("#emailMsg").html('Please enter your email.');
            } else {
                $("#emailMsg").html('Please enter a valid email.');
            }
            setTimeout(function () {
                $("#emailMsg").html('');
            }, 3000);
            return; // Stop form submission
        }

        // Check if phone is empty and a valid 10-digit number
        if (phone.trim() === '' || !isValidPhoneNumber(phone)) {
            if (phone.trim() === '') {
                $("#phoneMsg").html('Please enter your phone number.');
            } else {
                $("#phoneMsg").html('Please enter a valid 10-digit number.');
            }
            setTimeout(function () {
                $("#phoneMsg").html('');
            }, 3000);
            return; // Stop form submission
        }

        // Check if message is empty
        if (message.trim() === '') {
            $("#Msg").html('Please enter your message.');
            setTimeout(function () {
                $("#Msg").html('');
            }, 3000);
            return; // Stop form submission
        }

            const inputText = captchaInput.value.trim().toLowerCase();
            const captchaText = captchaTable.dataset.captcha.trim().toLowerCase();
            if (inputText === '') {
                resultMessage.textContent = 'Please enter the CAPTCHA.';
                resultMessage.classList.remove('text-green-500', 'text-red-500');
                setTimeout(function() {
        resultMessage.textContent = ''; // Clear the message after 3 seconds
    }, 3000);
                return; // Exit the function if CAPTCHA input is empty
            }
            // Verify the entered Captcha
            if (inputText !== captchaText) {
                resultMessage.textContent = 'Incorrect Captcha. Please try again.';
                resultMessage.classList.remove('text-green-500');
                resultMessage.classList.add('text-red-500');
                generateCaptchaTable(); // Refresh CAPTCHA on incorrect input
                setTimeout(function() {
                resultMessage.textContent = ''; // Clear the message after 3 seconds
            }, 3000);
                return; // Exit the function if CAPTCHA is incorrect
            }

            // CAPTCHA is correct, submit the form
            $('form').submit();
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
            captchaInput.value = ''; // Clear the input field
        }
    }

    $(document).ready(function () {
    // Prevent the default form submission
    $('form').submit(function (e) {
        e.preventDefault();




        // If all fields are filled and valid, proceed with form submission
        var formData = $(this).serialize(); // Serialize form data
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var url = '/save-contact-us'; // Replace 'your-endpoint-url' with your actual endpoint URL

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
            },
            success: function (response) {
                // Handle success response
                $("#msg").html('Thank you for contacting us. We will reach you shortly');
                console.log(response);
                $('form')[0].reset(); // Reset form after successful submission
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Show error message for other types of errors
                $("#msg").html('An error occurred while submitting the form.');
            }
        });
    });
});

// Function to validate email format
function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

// Function to validate phone number format (10 digits)
function isValidPhoneNumber(phone) {
    var phonePattern = /^\(\d{3}\) \d{3}-\d{4}$/; 
    return phonePattern.test(phone);
}

</script>


@endsection


    
