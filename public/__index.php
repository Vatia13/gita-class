<?php

class PDOWrapper {
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "password";
    
    public function test() {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=myDB", $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
};
