<?php
include("Baza.php");

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");
if(isset($_POST['iddel']))
{
    $obrisi = $_POST['iddel'];

    $Arr =get_object_vars($baza);

    $upit7="DELETE FROM korisnici where idKorisnik= :id";
    $rez7=$Arr["konekcija"]->prepare($upit7);
    $rez7->bindParam(':id', $obrisi);
    $rez7->execute();




}