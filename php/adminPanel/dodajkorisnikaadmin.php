<?php


include("../Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");




if(isset($_POST['btnDodajKorisnika'])){

    //var_dump($_POST['btnDodajKorisnika']);
    $tbime = $_POST['tbime'];
    $tbprezime = $_POST['tbprezime'];
    $tbmail = $_POST['tbmail'];

    $tbpassword= $_POST['tbpassword'];

    $izabraniaktivan = isset($_POST['izabraniaktivan']) ? $_POST['izabraniaktivan'] : null;
    $uloga = isset($_POST['uloga']) ? $_POST['uloga'] : null;




    $status = 404;


    $regIme ="/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/";
    $regPrezime ="/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/";
    $regPasword ="/^(.){8,20}$/";

    $regMail="/^[a-z][a-z0-9\.\_]{2,40}\@([a-z]{3,8}\.)com$/";

    $nizGreske = [];

    if(!preg_match($regIme, $tbime))
    {
        array_push($nizGreske, "Ime nije u dobrom formatu");
    }

    if(!preg_match($regPrezime, $tbprezime))
    {
        array_push($nizGreske, "Prezime nije u dobrom formatu");
    }
    if(!preg_match($regMail, $tbmail))
    {
        array_push($nizGreske, "E-mail nije u dobrom formatu.");
    }

    if(!preg_match($regPasword, $tbpassword))
    {
        array_push($nizGreske, "Passwor nije dobar.");
    }



    if(empty($uloga))
    {
        array_push($nizGreske, "Mora biti izabran uloga.");
    }

    if(count($nizGreske) == 0)
    {


        //idKorisnik
        //ime
        //prezime
        //email
        //lozinka
        //aktivacioniKod
        //aktivan
        //idUloga


        $Arr =get_object_vars($baza);

        $tbkod = sha1(md5(round(rand(1,999999999))));
        $tbpassword = md5($tbpassword);
        $uloga1=($uloga);
        $izabraniaktivan1=($izabraniaktivan);
        $upit = "INSERT INTO korisnici VALUES(null, :ime, :prezime,  :email, :lozinka, :token,  :aktivan,  :idUloga)";
        $rez = $Arr['konekcija']->prepare($upit);
        $rez -> bindParam(':ime', $tbime);
        $rez -> bindParam(':prezime', $tbprezime);

        $rez -> bindParam(':email', $tbmail);
        $rez -> bindParam(':lozinka', $tbpassword);


        $rez -> bindParam(':token', $tbkod);
        $rez -> bindParam(':aktivan', $izabraniaktivan1);
        $rez -> bindParam(':idUloga', $uloga1);





        try
        {
            $bool = $rez->execute();
            if($bool)
            {
                $feedback = ["message" => "Uspešno ste dodali korisnika."];
                $status = 201;
            }


        }
        catch(PDOException $e)
        {
            $feedback = ["message" => "Greska! " . $e->getMessage()];
            $status = 409;
        }



    }

    else
    {
        $status = 422;
        $feedback = $nizGreske;
    }


}

if(isset($status)){
    http_response_code($status);
}
if(isset($feedback)){

    echo json_encode($feedback);
}

?>