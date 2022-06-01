<!DOCTYPE html>
<html>
 <head>
  <title>Send a PHP Email</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <div class="row">
    <div class="col-md-8" style="margin:0 auto; float:none;">
     <h3 align="center">Send an Email</h3>
     <br />
     
     <form method="post">
      <div class="form-group">
       <label>Enter Name</label>
       <input type="text" name="name" placeholder="Enter Name" class="form-control"  />
      </div>
      <div class="form-group">
       <label>Enter Email</label>
       <input type="text" name="email" class="form-control" placeholder="Enter Email" />
      </div>
      <div class="form-group">
       <label>Enter Subject</label>
       <input type="text" name="subject" class="form-control" placeholder="Enter Subject" />
      </div>
      <div class="form-group">
       <label>Enter Message</label>
       <textarea name="message" class="form-control" placeholder="Enter Message"></textarea>
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="submit" value="Submit" class="btn btn-info" />
      </div>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/Exception.php');

if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];
  
  $mail = new PHPMailer(true);

  try {
    
                       
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'maheshsriramt.19it@kongu.edu';                    
    $mail->Password   = '10-Aug-02';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       
    $mail->Port       = 587;                                   

    
    $mail->setFrom($email, 'JEEVAN SOLVENT EXTRACTS PVT.LTD');
    $mail->addAddress($email);     
 

   
    
    $mail->isHTML(true);                                 
    $mail->Subject = $subject;
    $mail->Body    = 'NAME :'.$name.'<br>EMAIL :'.$email.'<br>MESSAGE :'.$message.'<br>';
    

    $mail->send();
    echo "<script>alert('Message has been send')</script>";
} catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>";
}
}