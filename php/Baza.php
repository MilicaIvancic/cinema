<?php

class Baza {
    // server, baza, username, password

    public $konekcija;

    function __construct($server, $baza, $username, $password)
    {
     // konekcija
        $this->konekcija = new PDO("mysql:host=".$server.";dbname=".$baza.";charset=utf8", $username, $password);

        $this->konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


    }

    function izvrsiUpit($upit){
    $result = $this->konekcija->query($upit)->fetchAll();
    return $result;


}

    function dohvatiJednogg($upit){
        $result = $this->konekcija->query($upit)->fetch();
        return $result;}

    function dohvatiUslov($upit){
        $result = $this->konekcija->query($upit)->fetch();
        return $result;}

}