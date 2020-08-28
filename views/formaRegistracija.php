
<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">

                    <form class="text-center border border-light p-5" id="mojn" name="forma2" action="<?= $_SERVER['PHP_SELF']; ?>" method='POST'>

                        <p class="h4 mb-4">Registrujte se</p>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- First name -->
                                <input type="text" id="tbime" class="form-control" placeholder="Ime" name="tbime">
                                <span id="ime"> Ime mora početi Velikim slovom i mora sadržati samo slova</span>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <input type="text" id="tbprezime" class="form-control" placeholder="Prezime"  name="tbprezime">
                                <span id="prezime"> Prezime mora početi Velikim slovom i mora sadržati samo slova</span>
                            </div>
                        </div>

                        <!-- E-mail -->
                        <input type="email" id="tbmail" class="form-control mb-4" placeholder="E-mail"  name="tbmail">
                        <span id="e-mail"> E-mail mora sadržati @. Primer : prea@gmail.com </span>

                        <!-- Password -->
                        <input type="password" id="tbpassword" class="form-control" placeholder="Lozinka" aria-describedby="defaultRegisterFormPasswordHelpBlock"  name="tbpassword">
                       <span id="password"> Lozinka Mora imati makar 8 karaktera i jedan specijalan znak </span>



                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block" type="button"   id="btnpotvrdi" name="btnpotvrdi">Registruj se</button>


                    </form>
                    <!-- Default form register -->

</div>

            </div>

        </div>
    </div>
        </div> <!-- .container -->
</main>