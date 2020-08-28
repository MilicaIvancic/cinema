<?php
@ob_start();
@session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'phpmailer/src/Exception.php';
include 'phpmailer/src/PHPMailer.php';
include 'phpmailer/src/SMTP.php';



if(isset($_POST['sbmKontakt']))
{
    $sadrzaj = $_POST['sadrzaj'];
    $naslov = $_POST['naslov'];
    $mailKorisnika = $_POST['mailKorisnika'];


    $regMail="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";


    $nizGreske = [];

    if(!preg_match($regMail, $mailKorisnika))
    {
        array_push($nizGreske, "E-mail nije u dobrom formatu.");
    }

    if(empty($sadrzaj))
    {
        array_push($nizGreske, "Sadržaj ne sme biti prazan");
    }

if(count($nizGreske)==0){
    $mail = new PHPMailer(true);


    try
    {
        $mail->SMTPDebug = 2;
        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,'allow_self_signed' => true));

        //$mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'perijanovic.peric@gmail.com';                 // SMTP username
        $mail->Password = 'milicaivancicq1q1q1';                           // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('perijanovic.peric@gmail.com', $mailKorisnika);
        $mail->addAddress('perijanovic.peric@gmail.com', $mailKorisnika);


        // content
        $mail->isHTML(true);
        $mail->Subject = $naslov;

        $mail->Body = $sadrzaj;

        $mail->send();
        echo json_encode(['msg1'=>'Message has been sent']);

        $status = 201;
        $_SESSION['info'] = "Vas mail je uspesno poslat.";
        header("Location: http://micikabioskop.000webhostapp.com/index.php");
    }

    catch (Exception $e)
    {
        echo json_encode(['msg'=>'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
        $_SESSION['info'] = "Poruka nije poslata! " . $mail->ErrorInfo;
        header("Location: http://micikabioskop.000webhostapp.com/index.php?page=kontakt");

    }

}
else{

           header("Location: ../index.php?page=kontaktGreska");
       }


}


?>
