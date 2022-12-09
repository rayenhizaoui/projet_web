<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <meta charset="UTF-8">
        <title>Sending Email</title>
    </head>
<body>
<div class="container">
    <h1>Sending an email using gmail SMTP in PHP</h1>
    <div class="jumbotron">
    <hr/>            
  <form action=""method="post" enctype="multipart/form-data">
    <label>To:</label><br>
    <input type="text" placeholder="To : Email Id " name="toid" required/><br>

    <label>Subject:</label><br>
    <input type="text" placeholder="Subject : " name="subject" required/><br>
    
    <label>Message</label><br>
    <textarea rows="4" placeholder="Enter Your Message..." name="message" required></textarea><br>

    <label>Choose a File/Image</label>
    <input type="file" class="file" name="image" id="image"/>

    <input type="submit" value="Send" name="send"/><br>
</form>
</div>
</div>
</body>
</html>
<?php

require 'phpmailer/PHPMailerAutoload.php';

//use PHPMailer\PHPMailer\PHPMailer;


//use PHPMailer\PHPMailer\Exception;



//require 'vendor/autoload.php';
//require 'connexion.php';




if(isset($_POST['send']))


{


$to_id = $_POST['toid'];


$subject =  $_POST['subject'];


$message = $_POST['message'];




$mail = new PHPMailer(true);




$mail->isSMTP();


$mail->Host = 'smtp.gmail.com';


$mail->SMTPAuth = true;




$mail->Username = 'rayenlorkha1@gmail.com';


$mail->Password = 'vijxbklqgybjxoqx';


$mail->SMTPSecure = 'tls';  


$mail->Port = 587;




$mail->setFrom('rayenlorkha1@gmail.com', 'RAYEN');


$mail->addAddress($to_id);


$mail->Subject = $subject;


$mail->Body = $message;




if(!$mail->send())


{


$error = "Mailer Error: " .$mail->ErrorInfo;


echo "<div class=display> '.$error.'  </div>";


}


else


{


echo " <div class=display> Message Sent </div>";


}




}


else


{


echo "<div class=display> Please Enter Valid Data </div>  ";


}




?>