<?php


session_start();
require 'db_connection.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/vendor/phpmailer/phpmailer/src/Exception.php'; // Adjust the path if necessary
require 'assets/vendor/phpmailer/phpmailer/src/SMTP.php'; // Adjust the path if necessary
require 'assets/vendor/phpmailer/phpmailer/src/PHPMailer.php'; // Adjust the path if necessary
// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
  // Server settings
  $mail->isSMTP();
  $mail->Host       = 'gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Username   = 'discovercebu2024@gmail.com';
  $mail->Password   = 'travelcebu';
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = 587;

  // Recipient 
  $email = 'discovercebu2024@gmail.com';
  $name  = 'Emmanuel A. Danuco II';

  // Content
  $signupCode = generateSignupCode(); // Your signup code generation logic
  $mail->setFrom('discovercebu2024@gmail.com', 'Weweb');
  $mail->addAddress($email, $name);
  $mail->isHTML(true);
  $mail->Subject = 'Signup Code';
  $mail->Body    = 'Your signup code is: ' . $signupCode;

  // Send email
  $mail->send();
  echo 'Signup code sent successfully!';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

function generateSignupCode()
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $codeLength = 6;
  $signupCode = '';

  // Generate a random code of specified length
  for ($i = 0; $i < $codeLength; $i++) {
    $signupCode .= $characters[rand(0, strlen($characters) - 1)];
  }

  return $signupCode;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign Up</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/logo.jpg" rel="apple-touch-icon">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">



      <!-- <h1 class="logo me-auto"><a href="index.php">Cicerone</a></h1> -->
      <h1 class="logo me-auto"><a href="index.php"><img src="assets/img/logo.jpg" alt=" "></a></h1>



      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>

          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.php">About</a></li>
              <li><a href="team.php">Team</a></li>


            </ul>
          </li>
          <li><a href="portfolio.php">Discover</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="login.php" class="getstarted">Sign In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Login or Signup</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="login.php">Login</a></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!--  resgister login -->

  <div class="carousel-container text-center mt-5 ">
    <div class="container">
      <h1 class="animate__animated animate__fadeInDown display-3 text-uppercase fw-bold">Sign<spam style="color:#d9232d"> up</spam>
      </h1>
    </div>
  </div>

  <div class="container mt-5 mb-5 ">

    <?php include('message.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Register Now

            </h4>
          </div>
          <div class="card-body">
            <form action="register.php" method="POST">

              <div class="mb-3">
                <label for="exampleFormControlInput1">Select image to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
              </div>
              <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="fullname" class="form-control">
              </div>
              <div class="mb-3">
                <label>Contact No</label>
                <input type="text" name="contact" class="form-control">
              </div>
              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="mb-3">
                <label>Present Address</label>
                <input type="text" name="address" class="form-control">
              </div>
              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="mb-3">
                <label>Retype Password</label>
                <input type="password" name="repeat_password" class="form-control">
              </div>

              <div class="mb-3">
                <button type="submit" name="register" class="btn btn-primary">Sign up</button>
              </div>

            </form>
          </div>
        </div>






      </div>

    </div>
  </div>




  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>DISCOVER CEBU</h3>
              <p>
                Poblacion, Claveria<br>
                Misamis Oriental<br><br>
                <strong>Phone:</strong> +6399444121491<br>
                <strong>Phone:</strong> +639300825662<br>
                <strong>Phone:</strong> +639948337158<br>
                <strong>Email:</strong> discovercebu2024@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="https://www.twitter.com/_discovercebu" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/people/Discover-Cebu/61560497165291/" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/_discovercebu" class="instagram"><i class="bx bxl-instagram"></i></a>

              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Details</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://mail.google.com/mail/ ">Mail us</a></li>

            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Discover Cebu</span></strong>. All Rights Reserved
      </div>

    </div>
    <div class="container">
      <div class="copyright">
        <strong><span>Disclaimer</span></strong><br>This website is created and maintained for educational purposes only. <br>It is intended to be used as part of a school project and is not intended for commercial use.
      </div>

    </div>
  </footer><!-- End Footer -->


</body>

</html>