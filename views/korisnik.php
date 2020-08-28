<?php if (isset($_SESSION['korisnik'])):

$korisnik=$_SESSION['korisnik'];
$mail1=$korisnik->email;
$ime=$korisnik->ime;
$prezime=$korisnik->prezime;



?>

<div class="mobile-navigation"></div>
</div>
</header>
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="row">
                <div class="col-md-12">

                    <h1> MicikaBioskop Vam želi dobrodošlicu! </h1>
                    <h2> Vaši podaci </h2>
                    <ul class="movie-meta">

                        <li> Korisnik: <?= $ime." ".$prezime?></li>
                        <li> E-mail: <?= $mail1?></li>
                        <li> <strong> Za promenu lozinke kontaktirajte administratora.</strong></li>
                    </ul>
                    <!-- Default form register -->

                </div>

            </div>

        </div>
    </div>
    </div> <!-- .container -->
</main>

<?php endif; ?>