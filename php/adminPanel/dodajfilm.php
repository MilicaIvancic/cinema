<?php


include("../Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");




if(isset($_POST['dodajFilm'])){
    var_dump($_POST);
    $naziv = $_POST['tbnazivf'];
    $opis = $_POST['tbopis'];
    $trajanje = $_POST['tbtrajanje'];

    $slika = $_FILES['fajls'];


    $name = $slika['name'];
    $tmp_name = $slika['tmp_name'];
    $type = $slika['type'];
    $size = $slika['size'];
    $error = $slika['error'];





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

    $velicina = 4.5 * 1024 * 1024;
    if($size > $velicina)
    {
        $nizGreske[] = "Velicina slike ne moze biti veca od 4.5 MB!";
    }
    if($type != "image/jpg" && $type != "image/jpeg" && $type != "image/png")
    {
        $nizGreske[] = "Format mora biti jpg, jpeg ili png!";
    }

    $type=explode("/", $type)[1];

    $imeSlike = explode(".", $name)[0];

    if($imeSlike == "slika")
    {
        $nizGreske[] = "Naziv slike ne moze biti slika!";
    }


    if(count($nizGreske) == 0)
    {
        $name = time() . $name;
        $novaLokacija = "../../dummy/$name";
        move_uploaded_file($tmp_name, $novaLokacija);

        $putanjaUOdnosuNaAdminPhp = "dummy/$name";

        //naziv
        //opis
        //slika
        //srv
        //datum
        //marker
        //trajanje



        $Arr =get_object_vars($baza);

        $datum=date("Y-m-d ");
        $upit = "INSERT INTO film VALUES(null, :naziv, :opis,  :slika, 'micika boskop slika', :datum,  0,  :trajanje)";
        $rez = $Arr['konekcija']->prepare($upit);
        $rez -> bindParam(':naziv', $naziv);
        $rez -> bindParam(':opis',$opis);

        $rez -> bindParam(':slika', $putanjaUOdnosuNaAdminPhp);
        $rez -> bindParam(':datum', $datum);


        $rez -> bindParam(':trajanje', $trajanje);






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