
<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">

                    <form class="text-center border border-light p-5" id="mojn" name="forma2" action="php/adminPanel/dodajfilm.php" method='POST' enctype='multipart/form-data'>

                        <p class="h4 mb-4">Dodaj Film</p>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- naziv -->
                                <input type="text" id="tbnazivf" class="form-control" placeholder="Naziv filma" name="tbnazivf">

                            </div>
                        </div>

                            <!-- slika -->
                        <div class="form-row mb-4">
                            <input type="file" id="fajls" name="fajls">
                            <!-- Password -->
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- opis -->
                                <textarea class="form-control mb-4" name='tbopis' rows=7 cols=55 placeholder='Unesite opis filma'></textarea>

                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- naziv -->
                                <input type="text" id="tbtrajanje" class="form-control" placeholder="Trajanje filma minuti" name="tbtrajanje">

                            </div>
                        </div>




                        <!--ULOGA-->


                            <!-- Sign up button -->
                            <button class="btn btn-info my-4 btn-block" type="submit"   id="dodajFilm" name="dodajFilm"> Dodaj Korisnika</button>


                    </form>
                    <!-- Default form register -->

                </div>

            </div>

        </div>
    </div>
    </div> <!-- .container -->
</main>
