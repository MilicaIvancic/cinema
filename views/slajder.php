<div class="mobile-navigation"></div>
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="row">
							<div class="col-md-12">
								<div class="slider">
									<!-- ovaj kod za slajder ide u for petlju, ucitavanje iz baze npr 5 najnovijih filmova -->
									<ul class="slides">
                                       <?php $slajder = $baza->izvrsiUpit("SELECT * FROM slajder");

           foreach ($slajder as $s): ?>

                  <li><a href="#"><img class="visina" src="<?= $s->src ?>" alt="<?= $s->alt ?>"></a></li>
              <?php endforeach;?>
              <!-- Realicacija slajdera -->


										<!--<li><a href="#"><img src="dummy/aquaman.jpg" alt="Slide 1"></a></li>
										<li><a href="#"><img src="dummy/venom.jpg" alt="Slide 2"></a></li>
										<li><a href="#"><img src="dummy/gameNight.jpg" alt="Slide 3"></a></li>-->
									</ul>
								</div>
							</div>
                            </div> <!-- .row -->