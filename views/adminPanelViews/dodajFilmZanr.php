
<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">

                    <form class="text-center border border-light p-5" id="mojn" name="forma2" action="php/adminPanel/dodajFilmZanr.php" method='POST'>

                        <p class="h4 mb-4">Dodaj filmZanr</p>

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


                        <!--ID zanr-->

                        <div class="form-group">
                            <label for="sel12">Izaberite žanr:</label>
                            <select class="form-control" id="sell2" name="sell2">
                                <option value="0"> Izaberite </option>

                                <?php $zanr = $baza->izvrsiUpit("SELECT * FROM zanr");


                                foreach($zanr as $r):?>
                                    <option value="<?=$r->idZanr?>"> <?=$r->nazivZanr?> </option>
                                <?php endforeach;?>
                            </select>

                        </div>






                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block" type="submit"   id="btnDodajFIlmZanr" name="btnDodajFIlmZanr"> Dodaj Žanr</button>


                    </form>
                    <!-- Default form register -->

                </div>

            </div>

        </div>
    </div>
    </div> <!-- .container -->
</main>
