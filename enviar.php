<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {

    $correo = $_POST["email"];

    $asunto = $_POST["asunto"];

    $mensaje = $_POST["mensaje"];
    
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'diegofergar22@gmail.com';                     
    $mail->Password   = '1003908723';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    
    
    $mail->setFrom('diegofergar22@gmail.com', 'Mailer');
    $mail->addAddress($correo, 'Joe User');       

    $mail->isHTML(true);                                  
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}