<?php

class Connection{
    public $stm;
    public function __construct(){
        try {
            $this->stm = new PDO('mysql:host=localhost;dbname=blogit_database','root','');
        }
        catch (PDOException $error) {
            echo 'Error en: -> ' . $error->getMessage();
        }
    }
}

?>