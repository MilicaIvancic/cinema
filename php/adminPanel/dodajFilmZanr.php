<?php


include("../Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");




if(isset($_POST['btnDodajFIlmZanr'])){
    //var_dump($_POST);
    $film = isset($_POST['sell']) ? $_POST['sell'] : null;
    $zanr= isset($_POST['sell2']) ? $_POST['sell2'] : null;






    $status = null;


    $nizGreske = [];

    if(empty($film)){
        array_push($nizGreske, "Film mora biti izabran");
    }


    if(empty($zanr)){
        array_push($nizGreske, "Zanr mora biti izabran");
    }



    if(count($nizGreske) == 0)
    {



        $Arr =get_object_vars($baza);

        $datum=date("Y-m-d ");
        $upit = "INSERT INTO filmzanr VALUES(null, :film, :zanr)";
        $rez = $Arr['konekcija']->prepare($upit);
        $rez -> bindParam(':film', $film);
        $rez -> bindParam(':zanr',$zanr);


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