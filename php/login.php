<?php
@ob_start();
@session_start();



if(isset($_POST['btnLogovanje'])){
    $email = $_POST['logovanjeEmail'];
    $password = $_POST['pass'];
    $password=md5($password);


    include "Baza.php";
    $baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");
    $Arr =get_object_vars($baza);

    $upit = "SELECT k.*, s.naziv FROM korisnici k INNER JOIN uloga s ON k.idUloga = s.idUloga WHERE email = :email AND lozinka= :password AND aktivan = 1";

    $priprema = $Arr['konekcija']->prepare($upit);

    $priprema->bindParam(":email", $email);

    $priprema->bindParam(":password", $password);

    try {
        $priprema->execute();

        if($priprema->rowCount() == 1){
            //echo "Postoji korisnik u bazi!";

            $korisnik = $priprema->fetch();
             //var_dump($korisnik);

            $_SESSION['korisnik'] = $korisnik;

            if($korisnik->naziv == "administrator"){
                header("Location: ../index.php?page=adminpanel");
            } else {
                header("Location: ../index.php?page=korisnik");

            }

        } else {
           header("Location: ../index.php?page=loselogovanje");
           // echo "NE Postoji korisnik u bazi!";
        }
    }
    catch(PDOException $x){
        echo $x->getMessage();
    }

}
