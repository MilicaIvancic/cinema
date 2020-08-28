
<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">

                    <form class="text-center border border-light p-5" id="mojn" name="forma2" action="php/adminPanel/dodajFilmDatum.php" method='POST'>

                        <p class="h4 mb-4">Dodaj Film</p>

                        <!--ID FILM-->

                        <div class="form-group">
                            <label for="sel1">Izaberite film:</label>
                            <select class="form-control" id="sel1" name="sell">
                                <option value="0"> Izaberite </option>

                                <?php $film = $baza->izvrsiUpit("SELECT * FROM film");


                                foreach($film as $r):?>
                                    <option value="<?=$r->idFilm?>"> <?=$r->naziv?> </option>
                                <?php endforeach;?>
                            </select>

                        </div>

                        <!-- brojkarata -->
                        <input type="text" id="tbbrojkarata" class="form-control mb-4" placeholder="Broj mesta u sali za izabrani film"  name="tbbrojkarata">

                        <!-- Password -->
                        <input type="text" id="tbcena" class="form-control" placeholder="Cena karte"  name="tbcena">




                        <!-- Sign up button -->
                            <button class="btn btn-info my-4 btn-block" type="submit"   id="brnDodajFilmDatum" name="brnDodajFilmDatum"> Dodaj film</button>


                    </form>
                    <!-- Default form register -->

                </div>

            </div>

        </div>
    </div>
    </div> <!-- .container -->
</main>
