$('.del').click(function(e){

    e.preventDefault();
    var iddel = $(this).attr('data-id');

    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/adminPanel/obrisikorisnikaadmin.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Korisnik uspesno obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                alert("Doslo je do greske!");
            }

        })
    }


})

$('.delfilm').click(function(e){

    e.preventDefault();
    var iddel = $(this).attr('data-id');

    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/adminPanel/obrisiFilm.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Uloga uspesno obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                console.log(xhr.message);
                console.log(errMsg.toString());
                console.log(status.toString());
            }

        })
    }


})

$('.delfilmdatum').click(function(e){

    e.preventDefault();
    var iddel = $(this).attr('data-id');

    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/adminPanel/obrisiFilm.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Uloga uspesno obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                console.log(xhr.message);
                console.log(errMsg.toString());
                console.log(status.toString());
            }

        })
    }


})

$('.delzanr').click(function(e){

    e.preventDefault();
    var iddel = $(this).attr('data-id');

    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: "php/adminPanel/obrisiZanrs.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function(data)
            {
                alert("Zanr obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function(xhr, status, errMsg)
            {
                console.log(xhr.message);
                console.log(errMsg.toString());
                console.log(status.toString());
            }

        })
    }


})

$('.delFilmZanr').click(function(e) {

    e.preventDefault();
    var iddel = $(this).attr('data-id');

    var x = confirm("Da li ste sigurni?");
    if (x) {
        $.ajax({
            url: "php/adminPanel/obrisiFilmZanr.php",
            method: "post",
            data: {
                iddel: iddel
            },
            success: function (data) {
                alert("FilmZanr obrisan!");
                window.location = "index.php?page=adminpanel";
            },
            error: function (xhr, status, errMsg) {
                console.log(xhr.message);
                console.log(errMsg.toString());
                console.log(status.toString());
            }

        })
    }
})