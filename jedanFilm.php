<?php
@ob_start();
@session_start();
if(isset($_GET['id'])):

$id = $_GET['id'];
require_once "php/Baza.php";

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");

    $Arr =get_object_vars($baza);

    $upit=("SELECT * FROM film WHERE idFilm = :id ");

    $upit_priprema = $Arr['konekcija']->prepare($upit);
    $upit_priprema->execute(array(":id"=>$id)); // Izvrsavanje upita sa konkretnim parametrom
    $priprema = $upit_priprema->fetch(); // Dohvatanje samo jednog reda kao

    $upit1=("SELECT z.nazivZanr FROM zanr z  inner join filmzanr fz on  z.idZanr = fz.idZanr inner join film f on f.idFilm=fz.idFilm   WHERE f.idFilm = :id ");

    $upit_priprema1 = $Arr['konekcija']->prepare($upit1);
    $upit_priprema1->execute(array(":id"=>$id));//
    //$zanrovi = $upit_priprema1->fetchAll();
//upit za repertoar:

    $d=date("Y-m-d ");
    $upit3=("SELECT fd.datum, fd.ukupanBrojKarata, fd.preostaliBrojKarata, fd.cena, fd.idFilmDatum FROM film f inner join filmdatum fd on f.idFilm = fd.idFilm WHERE f.idFilm = :id AND datum >= :d ORDER BY fd.datum");

    $upit_priprema3 = $Arr['konekcija']->prepare($upit3);
    $upit_priprema3->execute(array(":id"=>$id, ":d"=>$d));


//var_dump($zanrovi);
    //var_dump($zanrovi[0]);

if(isset($priprema)):

        include "views/head.php";
		include "views/logo.php";
		include "views/navigacioniMeni.php";


		?>

<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="index.html">MicikaBioskop</a>

                <span><?= $priprema->naziv ?></span>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="movie-poster"><img src="<?= $priprema->src ?>" alt="<?= $priprema->alt ?>"></figure>
                    </div>
                    <div class="col-md-6">
                        <h2 class="movie-title"><?= $priprema->naziv ?></h2>

                        <ul class="movie-meta">

                            <li><strong>Trajanje:</strong> <?= $priprema->trajanje." minuta" ?> </li>
                            <li><strong>Premiere:</strong> <?= $priprema->datumPrikazivanja ?></li>
                            <li><strong>Category:</strong>

                            <?php
                              if($upit_priprema1->rowCount() == 1){
                                  $zanrovi = $upit_priprema1->fetch();

                              echo $zanrovi->nazivZanr;}




                                elseif( $upit_priprema1->rowCount() > 1) { $zanrovi = $upit_priprema1->fetchAll();
                                    //var_dump($zanrovi);
                            foreach($zanrovi as $zanr){

                                 echo $zanr->nazivZanr.", ";
                                 //var_dump($zanr);

                            }}
                            elseif($upit_priprema1->rowCount() > 0){
                                  echo "flm nema definisan zanr";
                            }

 ?>
                                    </li> </ul>

                        <div class="movie-summary">
                            <p> <?= $priprema->opis; ?></p>
                            <h1> Reperoar </h1>


                            <ul class="movie-meta">


                                    <?php
                                    if($upit_priprema3->rowCount() == 1):
                                        $repertoar = $upit_priprema3->fetch();?>

                                        <ul class="movie-meta">

                                            <li><strong>Datum projekcije:</strong> <?= $repertoar->datum ?> </li>
                                            <li><strong>Broj karata:</strong> <?= $repertoar->ukupanBrojKarata ?></li>
                                            <li><strong>Broj slobodnih mesta:</strong> <?= $repertoar->preostaliBrojKarata ?></li>
                                            <li><strong>Cena karte:</strong> <?= $repertoar->cena ?> </li>
                                                <?php if(isset($_SESSION['korisnik'])):?>
                                               <li>  <form action="index.php?page=kupi" method="post">

                                                    <input type="hidden" name="id" value="<?=$repertoar->idFilmDatum?>"/>
                                                    <input type="submit" class="btn btn-info my-4 btn-block" name="kupi"   value ="Kupite karte"/> </li>

                                                </form> <?php endif;?>

                                                <?php if(!isset($_SESSION['korisnik'])):?>
                                               <li>Da bi kupili karte morate da se registrujete/logujete </li>
                                            <?php  endif;?>


                                        </ul>



                                    <?php   endif; ?>

                                   <?php  if( $upit_priprema3->rowCount() > 1):
                                    $repertoar = $upit_priprema3->fetchAll();
                                    //var_dump($repertoar);

                                    foreach($repertoar as $rep): ?>

                                        <ul class="movie-meta">

                                            <li><strong>Datum projekcije:</strong> <?= $rep->datum ?> </li>
                                            <li><strong>Broj karata:</strong> <?= $rep->ukupanBrojKarata ?></li>
                                            <li><strong>Broj slobodnih mesta:</strong> <?= $rep->preostaliBrojKarata ?></li>
                                            <li><strong>Cena karte:</strong> <?= $rep->cena ?> </li>
                                            <?php if(isset($_SESSION['korisnik'])):?>
                                                <li>  <form action="index.php?page=kupi" method="post">

                                                        <input type="hidden" name="id" value="<?=$rep->idFilmDatum?>"/>
                                                        <input type="submit" class="btn btn-info my-4 btn-block" name="kupi"   value ="Kupite karte"/> </li>

                                                </form> <?php endif;?>

                                            <?php if(!isset($_SESSION['korisnik'])):?>
                                                <li>Da bi kupili karte morate da se registrujete/logujete </li>
                                            <?php  endif;?>


                                        </ul>


                                    <?php  endforeach; ?>

                                <?php endif;?>

                                <?php  if( $upit_priprema3->rowCount() == 0):?>


                                    <h1> Nema repertoara za ovaj film </h1>


                                <?php endif;?>



                        </div>
                    </div>
                </div> <!-- .row -->
                <div class="entry-content">



                </div>
            </div>
        </div>
    </div> <!-- .container -->
</main>

<?php include "views/futer.php";
endif; endif;


?>
