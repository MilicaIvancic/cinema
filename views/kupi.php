

<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">

                    <form class="text-center border border-light p-5" id="mojn" name="forma2" action="php/kupikartu.php" method='POST'>

                        <p class="h4 mb-4">Kupite karte</p>

                        <?php if(isset($_POST['kupi'])){

                            $idFilmDatum = $_POST['id'];
                            //var_dump($id);
                        }?>

                        <!-- E-mail -->
                        <input type="text" id="tbKarta" name="tbKarta" class="form-control mb-4" placeholder="Unesite broj karata koji želite da kupite"  name="tbKarta">
                        <span id="karta" name="karta"> Unesite broj karata koji želite da kupite. </span>
                        <input type="hidden" name="skriveno" id="skriveno" value="<?=$idFilmDatum?>" >


                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block" type="submit"   id="btnkupiKarte" name="btnkupiKarte">Kupi </button>


                    </form>
                    <!-- Default form register -->

                </div>

            </div>

        </div>
    </div>
    </div> <!-- .container -->
</main>