<?php
include("../Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");

if(isset($_POST['izmeniFilm'])){


    $obrisi = $_POST['id'];

    $Arr =get_object_vars($baza);

    $upit="SELECT * FROM filmdatum where idFilm= :id";
    $rez=$Arr["konekcija"]->prepare($upit);
    $rez->bindParam(':id', $obrisi);
    $rez->execute();
    //var_dump($rez);
    $rez->fetchAll();

    if($rez->rowCount()>0){


        $upit7="UPDATE film SET marker=1 where idFilm= :id";
        $rez7=$Arr["konekcija"]->prepare($upit7);
        $rez7->bindParam(':id', $obrisi);
        $rez7->execute();
        header("Location: http://localhost/bioskop1/index.php?page=repertoar");
    }

else{
        header("Location: http://localhost/bioskop1/index.php");
}

}
