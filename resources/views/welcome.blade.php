<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <!-- Favicons -->
     
      
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
      
      
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
        <style>
          #mapid { height: 180px; }
        </style>
    </head>
    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
          <div class="container d-flex flex-column align-items-center">
      
            <h1>Check a users IP Reputation</h1>
            <h2>API tracking over 135 million VPN and host IP Addresses.</h2>
            
      
            <div class="subscribe">
              <h4>Subscribe now to get the latest updates!</h4>

                <div class="subscribe-form">
                  <input type="text" id="ip" name="text"><input name="clickip" type="submit" value="Enter IP  ">
                </div>
                <div class="mt-2">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your notification request was sent. Thank you!</div>
                </div>
            
            </div>
      
           
      
          </div>
        </header><!-- End #header -->
        <section id="contact" class="contact">
            <div class="container">

              
      
             
                <div class="row low">
                 
                </div>  
               
          </section><!-- End Contact Us Section -->
      
      
        <main id="main">
      
          <!-- ======= About Us Section ======= -->
          <section id="about" class="about">
            <div class="container">
      
              <div class="section-title">
                <h2>About Us</h2>
                <p>IPLegit is a service allowing you to check users who use your application against known bad users. You can use this service to detect and block VPN and hosting servers, use the service to get a fraud score on IP Addresses or even give users with known bad IP's captchas. We provide you with the data via our API and you can choose how to deal with known bad IP's.</p>
              </div>
      
              <div class="row mt-2">
                <div class="col-lg-4 col-md-6 icon-box">
                  <div class="icon"><i class="icofont-ssl-security"></i></div>
                  <h4 class="title"><a href="">Application Security</a></h4>
                  <p class="description">
                    Provide your application with an additional layer of security. Block bad users before they even reach your product.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                  <div class="icon"><i class="icofont-code-alt"></i></div>
                  <h4 class="title"><a href="">Developer Support</a></h4>
                  <p class="description">Determine what happens to bad IP addresses in your application. Get started with our easy to use documentation.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                  <div class="icon  "><i class="icofont-earth"></i></div>
                  <h4 class="title"><a href="">Easy Pricing</a></h4>
                  <p class="description">Use our free plan to get started and only pay when you need to. Our easy pricing means your application will always stay protected.</p>
                </div>
              </div>
      
            </div>
            <div class="social-links text-center">
              <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
              <a href="#" class="github"><i class="icofont-github"></i></a>
              <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
            </div>
          </section><!-- End About Us Section -->
      
          <!-- ======= Contact Us Section ======= -->
          
        </main><!-- End #main -->
      
        <!-- ======= Footer ======= -->
        <footer id="footer">
          <div class="container">
            <div class="credits">
              lahoucine hrird
            </div>
          </div>
        </footer><!-- End #footer -->
      
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
      
      
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/php-text-form/validate.js"></script>
        <script src="assets/vendor/jquery-countdown/jquery.countdown.min.js"></script>
     
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
        
        <script type="text/javascript">
        
            $(document).ready(function(){
           
               $('input[name="clickip"]').on('click',function(){
                        
                 var ip=$("#ip").val();

            $.ajax({
                url: 'testip/' + ip, 
                type: 'GET',  
                success: function(data) {
                  $('.low').empty();
                  $('.low').html(data);
                }
            });
                 
               });
            });
            $(document).ajaxStart(function() {
        // show loader on start
              $(".loading").css("display","block");
          }).ajaxSuccess(function() {
              // hide loader on success
              $(".loading").css("display","none");
          });
        
        </script>
    
    
      </body>
      
      </html>