<?php if(isset($_POST['izmeniFilm'])){

    $izmeni = $_POST['id'];
    var_dump($izmeni);
}
require_once "php/Baza.php";

$baza = new Baza("localhost","id8748747_micikabioskop","id8748747_micika","moramdauspem123");

$Arr =get_object_vars($baza);

$upit=("SELECT * FROM film WHERE idFilm = :id ");

$upit_priprema = $Arr['konekcija']->prepare($upit);
$upit_priprema->execute(array(":id"=>$izmeni)); // Izvrsavanje upita sa konkretnim parametrom
$priprema = $upit_priprema->fetch(); // Dohvatanje samo jednog reda kao ?>


<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">

                    <form class="text-center border border-light p-5" id="mojn" name="forma2" action="php/adminPanel/izmeniFilm.php" method='POST' enctype='multipart/form-data'>
                        <input type="hidden" name="hidden" id="skriveno" value="<?=$izmeni?>" >
                        <p class="h4 mb-4">Izmeni Film</p>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- naziv -->
                                <input type="text" id="tbnazivf" value="<?= $priprema->naziv?>" class="form-control" placeholder="Naziv filma" name="tbnazivf">

                            </div>
                        </div>

                        <!-- slika -->
                        <div class="form-row mb-4">
                            <label> Ostaviti prazno ako ne zelite da promenite sliku</label>
                        </div>
                        <div class="form-row mb-4">

                            <input type="file" id="fajls" name="fajls" >
                            <!-- Password -->
                        </div>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- opis -->
                                <textarea class="form-control mb-4" name='tbopis' rows=7 cols=55 placeholder='Unesite opis filma'><?=$priprema->opis?></textarea>

                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- naziv -->
                                <input type="text" id="tbtrajanje" class="form-control" placeholder="Trajanje filma minuti" value="<?= $priprema->trajanje?>" name="tbtrajanje">

                            </div>
                        </div>

                        <!-- STATUS-->
                        <div class="form-group">
                            <label for="sel1">Izaberite status filma:</label>
                            <select class="form-control" id="sel1" name="sell">
                                <option value="0"> Izaberite </option>

                                    <option value="1"

                                        <?php if($priprema->marker==0){
                                            echo "selected";
                                        } ?>
                                   > Nema reprtoar za ovaj film
                                   </option>
                                <option value="2"

                                <?php if($priprema->marker==1){
                                    echo "selected";
                                } ?>

                                > Postoji repertoar
                                </option>
                                <option value="3"

                                <?php if($priprema->marker==2){
                                    echo "selected";
                                } ?>
                                    > Film se vise ne prikazuje

                                    </option>

                            </select>



                        <!--ULOGA-->


                        <!-- Sign up button -->
                        <button class="btn btn-info my-4 btn-block" type="submit"   id="izmeni" name="izmeni"> Dodaj Korisnika</button>


                    </form>
                    <!-- Default form register -->

                </div>

            </div>

        </div>
    </div>
    </div> <!-- .container -->
</main>
