<?php


include("../Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");




if(isset($_POST['brnDodajFilmDatum'])){
    var_dump($_POST);
    $brojkarata = $_POST['tbbrojkarata'];
    $cena = $_POST['tbcena'];
    $film = isset($_POST['sell']) ? $_POST['sell'] : null;






    $status = null;


    $reg="/^[0-9]{2,4}$/";



    $regMail="/^[a-z][a-z0-9\.\_]{2,40}\@([a-z]{3,8}\.)com$/";

    $nizGreske = [];

    if(!preg_match($reg, $brojkarata))
    {
        array_push($nizGreske, "Ime nije u dobrom formatu");
    }

    if(!preg_match($reg, $cena))
    {
        array_push($nizGreske, "Prezime nije u dobrom formatu");
    }


if(empty($film)){
    array_push($nizGreske, "Film mora biti izabran");
}



    if(count($nizGreske) == 0)
    {


        //naziv
        //opis
        //slika
        //srv
        //datum
        //marker
        //trajanje



        $Arr =get_object_vars($baza);

        $datum=date("Y-m-d ");
        $upit = "INSERT INTO filmdatum VALUES(null, :film, :datum,  :brojkarata, 0, :cena,  :brojkarata)";
        $rez = $Arr['konekcija']->prepare($upit);
        $rez -> bindParam(':film', $film);
        $rez -> bindParam(':datum',$datum);

        $rez -> bindParam(':brojkarata', $brojkarata);
        $rez -> bindParam(':cena', $cena);









        try
        {
            $bool = $rez->execute();
            if($bool)
            {
                $feedback = ["message" => "Uspešno ste dodali korisnika."];
                $status = 201;
                header("Location: http://localhost/bioskop1/index.php?page=adminpanel");
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


?>