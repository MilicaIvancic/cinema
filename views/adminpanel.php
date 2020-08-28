<?php
@ob_start();
@session_start();

if(isset($_SESSION['korisnik'])):
//var_dump($_SESSION['korisnik']->naziv);
if($_SESSION['korisnik']->naziv == "administrator"):?>

<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="center">


                    <h1> Admin panel</h1>
                    <!-- Default form register -->
                    <h2> korisnic</h2>
                    <a href="index.php?page=dodajkorisnika"> dodaj korisnika </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th scope="col">idKorisnik</th>
                            <th scope="col">ime</th>
                            <th scope="col">prezime</th>
                            <th scope="col">email</th>
                            <th scope="col">lozinka</th>
                            <th scope="col">aktivacioniKod</th>
                            <th scope="col">aktivan</th>
                            <th scope="col">idUloga</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php $korisnik = $baza->izvrsiUpit("SELECT * FROM korisnici");

                        foreach ($korisnik as $k): ?>

                            <tr>

                                <td><?=$k->idKorisnik?></td>
                                <td><?=$k->ime?></td>
                                <td><?=$k->prezime?></td>
                                <td><?=$k->email?></td>
                                <td><?=$k->lozinka?></td>
                                <td><?=$k->aktivacioniKod?></td>
                                <td><?=$k->aktivan?></td>
                                <td><?=$k->idUloga?></td>
                                <td>
                                    <form action="index.php?page=izmenikorisnika" method="post">

                                        <input type="hidden" name="id" value="<?=$k->idKorisnik?>"/>
                                        <input type="submit" name="izmeniKorisnika"   value ="izmeni"/>

                                    </form>
                                </td>
                                <td><a href="#" data-id="<?=$k->idKorisnik?>" class="del" name="obrisi"> obrisi </a></td>
                            </tr>
                        <?php endforeach;?>
                        <!--<tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>izmeni</td>
                            <td>@obrisi</td>
                        </tr>  ovo ide u foreach-->

                       
                        </tbody>
                    </table>
                </div>

                <!-- prikaz filmova -->
                <h2> film</h2>
                <a href="index.php?page=dodajfilm"> dodaj film </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th scope="col">idFilm</th>
                            <th scope="col">naziv</th>
                            <th scope="col">opis</th>
                            <th scope="col">slika</th>
                            <th scope="col">datumPrikazivanja</th>
                            <th scope="col">marker</th>
                            <th scope="col">trajanje</th>


                        </tr>
                        </thead>
                        <tbody>

                        <?php $film = $baza->izvrsiUpit("SELECT * FROM film");

                        foreach ($film as $f): ?>

                            <tr>

                                <td><?=$f->idFilm?></td>
                                <td><?=$f->naziv?></td>
                                <td><?=$f->opis?></td>
                                <td><img src="<?=$f->src?>" alt="<?=$f->alt?>" class="img-thumbnail"</td>
                                <td><?=$f->datumPrikazivanja?></td>
                                <td><?=$f->marker?></td>
                                <td><?=$f->trajanje." minuta"?> </td>

                                <td>
                                    <form action="index.php?page=izmenifilm" method="post">

                                        <input type="hidden" name="id" value="<?=$f->idFilm?>"/>
                                        <input type="submit" name="izmeniFilm"   value ="izmeni"/>

                                    </form>
                                </td>
                                <td><a href="#" data-id="<?=$f->idFilm?>" class="delfilm" name="obrisi"> obrisi </a></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                </div>



                <!-- prikaz filmDatum -->
                <h2> dodaj filmDatum </h2>
                <a href="index.php?page=dodajfilmdatum"> dodaj film </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th scope="col">idFlmDatum</th>
                            <th scope="col">idFilm</th>
                            <th scope="col">datum</th>
                            <th scope="col">ukupanBrojKarata</th>
                            <th scope="col">cena</th>
                            <th scope="col">brojProdatihKarata</th>
                            <th scope="col">preostaliBrojKarata</th>


                        </tr>
                        </thead>
                        <tbody>

                        <?php $filmDatum = $baza->izvrsiUpit("SELECT * FROM filmDatum");

                        foreach ($filmDatum as $fd): ?>

                            <tr>

                                <td><?=$fd->idFilmDatum?></td>
                                <td><?=$fd->idFilm?></td>
                                <td><?=$fd->datum?></td>
                                <td><?=$fd->ukupanBrojKarata?></td>
                                <td><?=$fd->cena?></td>
                                <td><?=$fd->brojProdatihKarata?></td>
                                <td><?=$fd->preostaliBrojKarata." minuta"?> </td>


                                <td><a href="#" data-id="<?=$f->idFilm?>" class="delfilmdatum" name="obrisi"> obrisi </a></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                </div>



                <!-- prikaz zanr -->
                <h2> dodaj zanr </h2>
                <a href="index.php?page=dodajzanr"> dodaj film </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th scope="col">idZanr</th>
                            <th scope="col">nazivZanr</th>



                        </tr>
                        </thead>
                        <tbody>

                        <?php $zanr = $baza->izvrsiUpit("SELECT * FROM zanr");

                        foreach ($zanr as $fd): ?>

                            <tr>

                                <td><?=$fd->idZanr?></td>
                                <td><?=$fd->nazivZanr?></td>



                                <td><a href="#" data-id="<?=$fd->idZanr?>" class="delzanr" name="obrisi"> obrisi </a></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                </div>



                <!-- prikaz filmzanr -->
                <h2> dodaj filmZanr </h2>
                <a href="index.php?page=dodajfilmzanr"> dodaj film </a>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th scope="col">idFilmZanr</th>
                            <th scope="col">idZanr</th>
                            <th scope="col">idFilm</th>



                        </tr>
                        </thead>
                        <tbody>

                        <?php $filmZanr = $baza->izvrsiUpit("SELECT * FROM filmzanr");

                        foreach ($filmZanr as $fd): ?>

                            <tr>

                                <td><?=$fd->idFilmZanr?></td>
                                <td><?=$fd->idZanr?></td>
                                <td><?=$fd->idFilm?></td>



                                <td><a href="#" data-id="<?=$fd->idFilmZanr?>" class="delFilmZanr" name="obrisi"> obrisi </a></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                </div>
                <!-- do ovde kopiraj na hosting-->
            </div>

        </div>
    </div>
    </div> <!-- .container -->
</main>

<?php  else:
    http_response_code(403);
    header("Location: http://localhost/bioskop1/index.php?page=greska403");
 endif; else:  http_response_code(403);
    header("Location: http://localhost/bioskop1/index.php?page=greska403");
endif; ?>