<?php
require_once("CRUD.php");

class Database extends CRUD {
    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=e2195490;charset=utf8";

        $username = "e2195490";
        $password = "IV4t6LyS1QuxYrnBkj2W";
    
        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}    