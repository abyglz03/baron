<!DOCTYPE html>
<html lang="en">
<?php
include 'global/ServerConfiguration.php';
include 'global/DbConnection.php';
?>
<?php
require "PHPMailer/SMTP.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/Exception.php";

$txtName = (isset($_POST['name'])) ? $_POST['name'] : "";
$txtEmail = (isset($_POST['email'])) ? $_POST['email'] : "";
$txtSubject = (isset($_POST['subject'])) ? $_POST['subject'] : "";
$txtMessage = (isset($_POST['message'])) ? $_POST['message'] : "";
$result = "";
$error = "";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

//Create an instance; passing `true` enables exceptions
try {

  if (isset($_POST['submitB'])) {
    //Server settings
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.titan.email';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contacto@abi.barronrosso.space';          //SMTP username
    $mail->Password   = 'Clave123';                       //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('contacto@abi.barronrosso.space', 'Contacto');
    $mail->addAddress('contacto@abi.barronrosso.space', 'Contacto');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    //$mail->isHTML(true);                                  //Set email format to HTML
    //$mail->Subject = 'Here is the subject';
    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->isHTML(true);
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->addAddress($_POST['email']);
    $mail->Subject = 'Form Submission:' . $_POST['asunto'];
    $mail->Body = '<h3>El cliente ' . $_POST['name'] . '<br> con correo : ' . $_POST['email'] . '<br>Message: ' . $_POST['mensaje'] . '</h3>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
  }
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<head>
  <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand wobble-hvr animated" href="index.html"><img src="dist/img/LOGO-BARON-EFECTO.png" width="80px" height="95px" alt="" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menú
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
						<a href="index.php" class="nav-link">Inicio</a>
					</li>
					<li class="nav-item">
						<a href="menu.php" class="nav-link">Menú</a>
					</li>
					<li class="nav-item">
						<a href="blog.html" class="nav-link">Blog</a>
					</li>

					<li class="nav-item">
						<a href="contact.php" class="nav-link">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->



  <section class="ftco-section contact-section" style="background-image:url(dist/img/pic1.jpeg); ">
    <div class="container mt-5">
      <div class="row block-9">
        <div class="col-md-4 contact-info ftco-animate">
          <div class="row">
            <div class="col-md-12 mb-4">
              <h2 class="h4">Informacion de contacto</h2>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Direccion:</span> Blvrd del Maestro 273, Las Fuentes, 88740 Reynosa, Tamps.</p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Número:</span> <a href="tel://1234567920">+52 899 171 9258</a></p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Email:</span> <a href="mailto:contacto@baronrosso.mx ">contacto@baronrosso.mx </a></p>
            </div>
            <div class="col-md-12 mb-3">
              <p><span>Sitio Web:</span> <a href="#">https://www.baronrosso.mx/</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 ftco-animate">
          <form class="form-contact contact_form" method="POST">
            <div class="row">
              <div>
                <h5><?= $result; ?> </h5>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control " name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu nombre'" placeholder="Ingresa tu nombre">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control " name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu correo'" placeholder="Ingresa tu correo">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe tu mensaje'" placeholder="Escribe tu mensaje"></textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Asunto'" placeholder="Asunto">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="submitB" value="submitB" class="button  boxed-btn">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <div id="map"></div>
  <p>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;
    <script>
      document.write(new Date().getFullYear());
    </script>
    Los derechos estan reservados por Abigail Gonzalez
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  </p>
  </div>
  </div>
  </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>