<?php

if(isset($_GET['token'])){
    $token = $_GET['token'];

    // upit ka bazi

    include "Baza.php";
    $baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");
    $Arr =get_object_vars($baza);

    $upit = "SELECT * FROM korisnici WHERE aktivacioniKod = :token";

    $priprema_upit = $Arr['konekcija']->prepare($upit);

    $priprema_upit->bindParam(":token", $token);

    try {
        $rezultat = $priprema_upit->execute();
        if($rezultat){
            $korisnik = $priprema_upit->fetch();
            if(empty($korisnik)){
                echo "Niste registrovani!";

            } else {

                // ako postoji korisnik

                // UPDATE aktivan

                $upit = "UPDATE korisnici SET aktivan = 1
				 WHERE aktivacioniKod = :token";

                $priprema = $Arr['konekcija']->prepare($upit);

                $priprema->bindParam(":token", $token);

                $rez = $priprema->execute();

                if($rez){
                    header("Location: http://localhost/bioskop/index.php?page=index");

                } else {
                    echo "Izvinite, greska!";
                }



            }

        } else {
            echo "Upit nije ok.";
        }
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
    }
}