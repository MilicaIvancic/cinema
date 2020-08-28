$(document).ready(function(){



    $('span').hide();


    document.getElementById("btnkupiKarte").addEventListener("click", proveri);


    var kartareg = /^[0-9]{1,3}$/;

    function proveri(){

        var karta=document.getElementById("tbKarta").value;
        var skriveno=document.getElementById("skriveno").value;



        var nizGreske=[];




        if(!kartareg.test(karta))
        {

            $('#karta').show();
            nizGreske.push("Text nije dobro.");
        }
        else
        {

            $('#karta').hide();
        }


        // console.log(nizGreske);

        if(nizGreske.length != 0)
        {
            console.log(nizGreske);
        }
        else
        {
            saljiAjaxom();

        }

        function saljiAjaxom()
        {
            $.ajax({
                url: "php/kupikartu.php",
                method: "post",
                dataType: "json",
                data:
                    {
                        btnkupiKarte:"nesto",
                        skriveno: skriveno,
                        karta: karta
                    },
                success: function(data)
                {
                    alert(data.message);
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