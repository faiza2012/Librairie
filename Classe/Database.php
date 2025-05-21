<?php
require_once("CRUD.php");

class Database extends CRUD {
    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=librairie;charset=utf8";
        $username = "root";
        $password = "";

        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
