<?php

class DB {
    private $conn;
    
    public function getConnection() {
        $this->conn = new DatabaseConnection("localhost", "user", "password");
    }
    
    public function execReader($SQL) {
        return $this->conn->query($SQL);
    }
    
    public function execSQL($SQL) {
        return $this->conn->prepare($SQL);
    }
    
    public function fechaConexao() {
        $this->conn->close();
    }
}

class MyUserClass {

     public function getUserList() {
        $SQL = "select name from user";
		$DB = new DB();
		$DB->getConnection();
		$results = $DB->execReader($SQL);
		$array = array();
        while ($row = $results->fetch_array()) {
            $array[] = array($row["name"]);
        }
		$DB->fechaConexao();
        sort($array);
        return $array;
    }
}