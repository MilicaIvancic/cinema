
<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">

                    <form class="text-center border border-light p-5" id="mojn" name="forma2" action="php/dodajKorisnika.php" method='POST'>

                        <p class="h4 mb-4">Dodaj korisnika</p>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- First name -->
                                <input type="text" id="tbime1" class="form-control" placeholder="Ime" name="tbime1">
                                <span id="ime1"> Ime mora početi Velikim slovom i mora sadržati samo slova</span>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <input type="text" id="tbprezime1" class="form-control" placeholder="Prezime"  name="tbprezime1">
                                <span id="prezime1"> Prezime mora početi Velikim slovom i mora sadržati samo slova</span>
                            </div>
                        </div>

                        <!-- E-mail -->
                        <input type="email" id="tbmail1" class="form-control mb-4" placeholder="E-mail"  name="tbmail1">
                        <span id="mail1"> E-mail mora sadržati @. Primer : prea@gmail.com </span>

                        <!-- Password -->
                        <input type="password" id="tbpassword1" class="form-control" placeholder="Lozinka" aria-describedby="defaultRegisterFormPasswordHelpBlock"  name="tbpassword1">
                        <span id="password1"> Lozinka Mora imati makar 8 karaktera i jedan specijalan znak </span> </br>

<!-- Izaberite aktivnost-->
                        <label> Podesite status aktivnosti</label>
                        <div class="radio">
                            <label><input class="radio_aktivan" type="radio" name="radio2" value="0" checked>AKtivan</label>
                        </div>
                        <div class="radio">
                            <label><input class="radio_aktivan" type="radio" value="1" name="radio2">Neaktivan</label>
                        </div>
                        <span id="pol2"> Morate odabrati status </span>
              <!--ULOGA-->

                        <div class="form-group">
                            <label for="sel1">Izaberite ulogu:</label>
                        <select class="form-control" id="sel1" name="sell">
                            <option value="0"> Izaberite </option>

                            <?php $uloga = $baza->izvrsiUpit("SELECT * FROM uloga");


                            foreach($uloga as $r):?>
                                <option value="<?=$r->idUloga?>"> <?=$r->naziv?> </option>
                            <?php endforeach;?>
                        </select>

                            <span id="pol4"> Morate odabrati ulogu </span>

                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block" type="button"   id="btnDodajKorisnika" name="btnDodajKorisnika"> Dodaj Korisnika</button>


                    </form>
                    <!-- Default form register -->

                </div>

            </div>

        </div>
    </div>
    </div> <!-- .container -->
</main>
