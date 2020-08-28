<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
@ob_start();
@session_start();

if (isset($_SESSION['korisnik'])){

$korisnik=$_SESSION['korisnik'];
$mail1=$korisnik->email;
$mail2=(string)$mail1;
//var_dump($mail);


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include("Baza.php");

    $baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");

if (isset($_POST['btnkupiKarte'])) {
    $skriveno = $_POST['skriveno'];
    $karta = $_POST['tbKarta'];
    //var_dump($skriveno);
 $naziv="";
 $mojacena=0;

    $status = 404;
    $regKarta = "/^[0-9]{1,3}$/";

    $nizGreske = [];


    if (!preg_match($regKarta, $karta)) {
        array_push($nizGreske, "Unesite broj.");
    }


    if (count($nizGreske) == 0) {


        $Arr = get_object_vars($baza);


        $upit = "SELECT * from filmdatum where idFilmDatum = :d AND preostaliBrojKarata >= :broj";
        $rez = $Arr['konekcija']->prepare($upit);




        try {
            $rez->execute(array(":d" => $skriveno, ":broj"=>$karta));
            $priprema = $rez->fetch();
            if ($priprema) {
                $preostali = $priprema->preostaliBrojKarata;
                $prodato = $priprema->brojProdatihKarata;

                $ostalo = (int)$preostali;
                $kupljeno = (int)$prodato;
                $brojKarata = (int)$karta;

                $posaljiProdato = $ostalo - $brojKarata;
                $posaljiKupljeno = $prodato + $brojKarata;
                $upit = "UPDATE filmdatum SET brojProdatihKarata = :preostalobr, preostaliBrojKarata = :pbr WHERE idFilmDatum = :skriveno";
                $rez = $Arr['konekcija']->prepare($upit);
                $rez->bindParam(':pbr', $posaljiProdato);
                $rez->bindParam(':preostalobr', $posaljiKupljeno);
                $rez->bindParam(':skriveno', $skriveno);
////////////////////////////////////////////////////////////////////////////////
                $upit3=("SELECT  fd.cena, f.naziv FROM film f inner join filmdatum fd on f.idFilm = fd.idFilm WHERE fd.idFilmDatum = :id ");

                $cena = $Arr['konekcija']->prepare($upit3);
                $cena->execute(array(":id"=>$skriveno));

                $cenaKarte=$cena->fetch();
                $cena2=$cenaKarte->cena;
                $mojacena1=(int)$cena2;

                $mojacena=$mojacena1*$brojKarata;
                $naziv=$cenaKarte->naziv;
                try {
                    $bool = $rez->execute();
                    if ($bool) {
                        $feedback = ["message" => "Kupili Ste karte."];
                        $status = 201;
						header("Location: http://localhost/bioskop1/index.php");
                    }


                } catch (PDOException $e) {
                    $feedback = ["message" => "Greska! " . $e->getMessage()];
                    $status = 409;
                }
            } else {

                $feedback = ["message" => "Ne postoji taj film! "];
                $status = 409;
            }

            //slanje maila
            $mail = new PHPMailer(true);

            try {
//Server settings
                $mail->SMTPDebug = 0;
                // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'perijanovic.peric@gmail.com';                 // SMTP username
                $mail->Password = 'milicaivancicq1q1q1';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

//Recipients
                $mail->setFrom('perijanovic.peric@gmail.com', 'Millica Ivancic');
                $mail->addAddress($mail2, 'Milica Ivancic');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//Content

                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Kupovina karata za MicikaBioskop';
                $mail->Body = " Uspesno ste kupili $karta karata. Za ovaj užitak ste potrošili $mojacena dinara. 
                Nadamo se da ćete uživati u odabranom filmu $naziv samo za Vas :D ";
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $feedback = ["message" => "Čestitamo, kupili ste karte"];
                header("Location: http://localhost/bioskop/index.php?page=index");
// echo 'Message has been sent';
                $code = 200;
            } catch (Exception $e) {
                $code = 500;
            }
        } catch (PDOException $e) {
            $feedback = ["message" => "Greska! " . $e->getMessage()];
            $status = 409;
        }


    } else {
        $status = 422;
        $feedback = $nizGreske;
    }


} else {
    //header("Location: http://localhost/bioskop/index.php?page=index"); // ovde moze da stoji i header("Location: index.php") jer ako udje u else znaci da je probao direktan pristup strani
}

http_response_code($status);

// echo json_encode($feedback);

}?>