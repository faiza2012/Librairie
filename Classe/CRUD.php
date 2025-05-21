<?php
class CRUD extends PDO {

    public function __construct() {
        parent::__construct('mysql:host=localhost;dbname=librairie;charset=utf8', 'root', '');
    }

    public function select($table, $field = 'id', $order='asc'){
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $field = 'id'){
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        return $stmt->rowCount() === 1 ? $stmt->fetch() : false;
    }

    public function insert($table, $data){
        $fields = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->lastInsertId();
    }

    public function update($table, $data, $field = "id"){
        $updates = '';
        foreach($data as $key => $value){
            $updates .= "$key = :$key, ";
        }
        $updates = rtrim($updates, ', ');
        $sql = "UPDATE $table SET $updates WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    public function delete($table, $value, $field = 'id'){
        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        return $stmt->execute();
    }
}
