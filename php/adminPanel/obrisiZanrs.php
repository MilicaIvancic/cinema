<?php
include("../Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");

//var_dump($POST);
if(isset($_POST['iddel']))
{
    $obrisi = $_POST['iddel'];
    //var_dump($obrisi);

    $Arr =get_object_vars($baza);

    $upit="SELECT * FROM filmzanr where idZanr= :id";
    $rez=$Arr["konekcija"]->prepare($upit);
    $rez->bindParam(':id', $obrisi);
    $rez->execute();
    //var_dump($rez);
    $rez->fetchAll();

    if($rez->rowCount()>0){
        $upit2="DELETE FROM filmzanr where idZanr= :id";
        $rez2=$Arr["konekcija"]->prepare($upit2);
        $rez2->bindParam(':id', $obrisi);
        $rez2->execute();
    }

    $upit7="DELETE FROM zanr where idZanr= :id";
    $rez7=$Arr["konekcija"]->prepare($upit7);
    $rez7->bindParam(':id', $obrisi);
    $rez7->execute();




}