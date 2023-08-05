<?php 



class Countries {

public function AddNewCountry($postname) {

    $db = $this->database;
    
    $db->write("INSERT INTO Countries (country) VALUES (:Country)",$postname);
    header("Location: ".ROOT."Admin");
    }
}