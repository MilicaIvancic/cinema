$(document).ready(function(){


    document.getElementById("tbime1").focus();
    $('span').hide();



    document.getElementById("btnDodajKorisnika").addEventListener("click", proveri);


    var regIme = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,20}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,20})?$/;
    var regPrezime = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,20}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,20})?$/;
    var regPasword = /^(.){8,35}$/;

    var regMail=/^[a-z][a-z0-9\.\_]{2,40}\@([a-z]{3,8}\.)com$/;






    function proveri(){
        var ime1=document.getElementById("tbime1").value;

        var prezime1=document.getElementById("tbprezime1").value;
        var email=document.getElementById("tbmail1").value;
        var hidden=document.getElementById("skriveno").value;
        var pasword1=document.getElementById("tbpassword1").value;


        var nizGreske=[];

        var aktivan=document.getElementsByClassName("radio_aktivan");
        var ulogai=document.getElementById("sel1");
        var izabraniaktivan="";
        var uloga="";



        // ----- radio buttoni ----- //
// ----- radio buttoni ----- //


///ovo je za status
        for(var i=0; i<aktivan.length; i++)
        {
            if(aktivan[i].checked)
            {
                izabraniaktivan = aktivan[i].value;
                break;
            }
        }
        if(izabraniaktivan == "")
        {
            nizGreske.push("Pol mora biti izabran.");
            $('#pol2').show();
        }
        else {
            $('#pol2').hide();

        }
///ovo je za id uloga
        for(var i=1; i<ulogai.length; i++)
        {
            if(ulogai[i].selected)
            {
                uloga = ulogai[i].value;
                break;
            }
        }
        if(uloga == "")
        {
            nizGreske.push("Uloga mora biti izabrana.");
            $('#pol4').show();
        }
        else {
            $('#pol4').hide();

        }
////////////// plja
        if(!regIme.test(ime1))
        {

            $('#ime1').show();
            //nizGreske.push("Ime nije dobro.");
        }
        else
        {

            $('#ime1').hide();


        }

        if(!regPrezime.test(prezime1))
        {

            $('#prezime1').show();
            nizGreske.push("Prezime nije dobro.");
        }
        else
        {

            $('#prezime1').hide();
        }


        if(!regPasword.test(pasword1))
        {
            $('#password1').show();
            nizGreske.push("Lozinka nije dobra.");
        }
        else
        {
            $('#password1').hide();
        }

        if(!regMail.test(email))
        {
            $('#mail1').show();
            nizGreske.push("E-mail nije dobar.");
        }
        else
        {
            $('#mail1').hide();

        }

        console.log(nizGreske);

        if(nizGreske.length != 0)
        {
            //$('#ispisigreske').show();
        }
        else
        {
            saljiAjaxom();

        }

        function saljiAjaxom()
        {
            $.ajax({
                url: "php/adminPanel/izmenikorisnikaadmin.php",
                method: "post",
                // server mora da vrati json, ali neki put upada u error ako se stavi dataType: "json", u tom slucaju samo obirsati dataType: json
                dataType: "json",
                // saljemo json
                data:
                    {
                        btnDodajKorisnika: "nesto",
                        hidden: hidden,
                        tbime: ime1,
                        tbprezime: prezime1,
                        tbmail: email,
                        tbpassword: pasword1,
                        izabraniaktivan: izabraniaktivan,
                        uloga:uloga

                        // $_POST["btnPotvrdi" => "trange frange", "tbImePrezime" => "Mladen Petrovic"]
                    },
                success: function(data)
                {
                    // data je ono sto vraca server, u ovom slucaju json..
                    alert(data.message);
                    window.location = "index.php?page=adminpanel";
                    console.log(data.message);
                },
                error: function(xhr, status, errorMsg)
                {
                    console.log(xhr);


                    if(xhr.status == 404)
                    {
                        console.log("Stranica nije nadjena");
                    }
                    else if(xhr.status == 422)
                    {
                        var greske = "<ol>";
                        var feedback = JSON.parse(xhr.responseText);
                        for(var i in feedback)
                        {
                            greske += "<li>" + feedback[i] + "</li>";
                        }
                        greske += "</ol>";

                        console.log(greske);
                    }
                    else if(xhr.status == 409)
                    {
                        console.log("Uneti podaci vec postoje");
                    }

                    else
                    {
                        console.log("Greska");
                        console.log(xhr)
                        //alerti(xhr.responseText);
                    }

                }

            });
        };




    };
});