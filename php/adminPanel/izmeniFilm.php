<?php


include("../Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");




if(isset($_POST['izmeni'])){

    $naziv = $_POST['tbnazivf'];
    $opis = $_POST['tbopis'];
    $trajanje = $_POST['tbtrajanje'];

    $hidden = $_POST['hidden'];






    $status = null;


    $regNaziv ="/^[A-ZČĆŽŠĐ]/";
    $regtrajanje ="/^[0-9]{2,4}$/";


    $regMail="/^[a-z][a-z0-9\.\_]{2,40}\@([a-z]{3,8}\.)com$/";

    $nizGreske = [];

    if(!preg_match($regNaziv, $naziv))
    {
        array_push($nizGreske, "Ime nije u dobrom formatu");
    }

    if(!preg_match($regNaziv, $opis))
    {
        array_push($nizGreske, "Prezime nije u dobrom formatu");
    }
    if(!preg_match($regtrajanje, $trajanje))
    {
        array_push($nizGreske, "E-mail nije u dobrom formatu.");
    }



    if(count($nizGreske) == 0)
    {




            $Arr =get_object_vars($baza);

            $datum=date("Y-m-d ");
            $upit = "UPDATE film SET  naziv=:naziv, opis=:opis,  trajanje=:trajanje,  datumPrikazivanja=:datum  WHERE idFilm=:id)";
            $rez = $Arr['konekcija']->prepare($upit);
            $rez -> bindParam(':naziv', $naziv);
            $rez -> bindParam(':opis',$opis);
            $rez -> bindParam(':datum', $datum);

            $rez -> bindParam(':id',$hidden);


            $rez -> bindParam(':trajanje', $trajanje);

            var_dump($rez);
            try
            {
                $bool = $rez->execute();
                var_dump($bool);
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

    //}







}


?>