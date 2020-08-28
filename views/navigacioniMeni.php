<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">

                            <?php $generisimeni = $baza->izvrsiUpit("SELECT * FROM meni");

                            foreach($generisimeni as $link) :
                                if($link->naziv=="Odjava"):
                                    if(isset($_SESSION['korisnik'])):?>
                                        <li class="menu-item">  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
                                    <?php endif;
                                elseif($link->naziv=="admin panel"):
                                    if(isset($_SESSION['korisnik'])):
                                        //var_dump($_SESSION['korisnik']->naziv);
                                        if($_SESSION['korisnik']->naziv == "administrator"):?>

                                            <li class="menu-item">  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>


                                        <?php endif; endif;  ?>
                                <?php
                                elseif($link->naziv=="Moj nalog"):
                                    if(isset($_SESSION['korisnik'])):
                                        //var_dump($_SESSION['korisnik']->naziv);
                                        ?>

                                        <li class="menu-item">  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
                                    <?php endif;  ?>

                                <?php
                                elseif($link->naziv=="Registracija"):
                                    if(!isset($_SESSION['korisnik'])):
                                        //var_dump($_SESSION['korisnik']->naziv);
                                        ?>

                                        <li class="menu-item">  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
                                    <?php endif;  ?>
                                <?php
                                elseif($link->naziv=="Logovanje"):
                                    if(!isset($_SESSION['korisnik'])):
                                        //var_dump($_SESSION['korisnik']->naziv);
                                        ?>

                                        <li class="menu-item">  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
                                    <?php endif;  ?>

                                <?php else: ?>
                                    <li class="menu-item" >  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
                                <?php endif; endforeach; ?>
							<!--<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item"><a href="index.php?page=registracija">Registracija</a></li>
                            <?php
                            if(isset($_SESSION['korisnik'])):?>

                                <li class="menu-item"><a href="php/logout.php">Odjava</a></li>
                            <?php  endif;?>
							<li class="menu-item"><a href="index.php?page=logovanje">Logovanje</a></li>
							<li class="menu-item"><a href="joinus.html">Join us</a></li>
							<li class="menu-item"><a href="contact.html">Contact</a></li>-->
						</ul> <!-- for petljom iscitati meni iz baze, + uslovi zbog korisnika -->

						<form action="#" class="search-form">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- .main-navigation -->

