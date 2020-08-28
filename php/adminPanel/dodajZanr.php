<?php


include("../Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");


if(isset($_POST['btnDodajZanr'])){
    var_dump($_POST);
    $naziv = $_POST['tbnaziv'];



    $status = null;


    $reg="/^[A-z]{3,40}$/";



    $nizGreske = [];

    if(!preg_match($reg, $naziv))
    {
        array_push($nizGreske, "Naziv nije u dobrom formatu");
    }



    if(count($nizGreske) == 0)
    {

        $Arr =get_object_vars($baza);


        $upit = "INSERT INTO zanr VALUES(null, :naziv)";
        $rez = $Arr['konekcija']->prepare($upit);
        $rez -> bindParam(':naziv', $naziv);
 var_dump($rez);

        try
        {
            $bool = $rez->execute();
            var_dump($bool);
            if($bool)
            {
                $feedback = ["message" => "Uspešno ste dodali korisnika."];
                $status = 201;
                header("Location: ../../index.php?page=adminpanel");
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