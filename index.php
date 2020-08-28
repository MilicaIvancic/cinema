<?php
@ob_start();
@session_start();
require_once "php/Baza.php";
$page = "";

if(isset($_GET['page'])){
    $page = $_GET['page'];}

else{
    $page='index';
}


//var_dump($_GET);
echo "<br/>";
$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");


//var_dump($_SESSION['korisnik']);

include "views/head.php";
include "views/logo.php";
include "views/navigacioniMeni.php";

//if(!isset($_SESSION['korisnik'])){

//include "views/logovanje.php";

//}



switch($page){
    case "index":
        include "views/slajder.php";
        include "views/prikazFilmova.php";
        break;
    case "loselogovanje":
        include "views/loselogovanje.php";
        break;
    case "registracija":
        if(!isset($_SESSION['korisnik'])){

            include "views/formaRegistracija.php";
        }
        break;
    case "logovanje":
        if(!isset($_SESSION['korisnik'])){

            include "views/logovanjeForma.php";
        }
        break;
    case "adminpanel":
        include "views/adminpanel.php";
        break;
    case "korisnik":
        include "views/korisnik.php";
        break;
    case "kupi":
        include "views/kupi.php";
        break;
    case "repertoar":
        include "views/repertoar.php";
        break;
    case "kontakt":
        include "views/kontakt.php";
        break;
    case "greska403":
        include "views/greske/greska403.php";
        break;
    case "kontaktGreska":
        include "views/greske/greskaKontakt.php";
        break;
    case "dodajkorisnika":if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->naziv == "administrator"){
            include "views/adminPanelViews/dodajkorisnika.php";}}
    else {
        include "views/greske/greska403.php";
    }
        break;
    case "izmenikorisnika":if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->naziv == "administrator"){
            include "views/adminPanelViews/izmenikorisnika.php";}}
    else {
        include "views/greske/greska403.php";
    }
        break;
    case "dodajfilm":if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->naziv == "administrator"){
            include "views/adminPanelViews/dodajFilm.php";}}
    else {
        include "views/greske/greska403.php";
    }
        break;
    case "dodajfilmdatum":if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->naziv == "administrator"){
            include "views/adminPanelViews/dodajFilmDatum.php";}}
    else {
        include "views/greske/greska403.php";
    }
        break;
    case "izmenifilm":if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->naziv == "administrator"){
            include "views/adminPanelViews/izmeniFilm.php";}}
    else {
        include "views/greske/greska403.php";
    }
        break;
    case "dodajzanr":if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->naziv == "administrator"){
            include "views/adminPanelViews/dodajZanr.php";}}
    else {
        include "views/greske/greska403.php";
    }
        break;
    case "dodajfilmzanr":if(isset($_SESSION['korisnik'])){
        if($_SESSION['korisnik']->naziv == "administrator"){
            include "views/adminPanelViews/dodajFilmZanr.php";}}
    else {
        include "views/greske/greska403.php";
    }
        break;



}



include "views/futer.php";
?>

	

					

					
						
						
						
						
