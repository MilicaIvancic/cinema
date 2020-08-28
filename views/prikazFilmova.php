<div class="row">

    						<!-- .sve u ovom redu se ucitava iz baze, npr 8 najnovijih filmova -->

    <?php $film = $baza->izvrsiUpit("SELECT * FROM film WHERE marker=1 ORDER BY datumPrikazivanja DESC LIMIT 8");

    foreach ($film as $s): ?>

        <div class="col-sm-6 col-md-3">
            <div class="latest-movie">
                <h1><?= $s->naziv ?> </h1>
                <div class="visina"> <a href="jedanFilm.php?id=<?= $s->idFilm?>""><img src="<?= $s->src ?>" alt="<?= $s->alt ?>"></a>
                    <a href="jedanFilm.php?id=<?= $s->idFilm?>"> projekcije </a> </div>


            </div>
        </div>

    <?php endforeach;?>


						</div> <!-- .row -->
</div>
</div>
</div> <!-- .container -->
</main>