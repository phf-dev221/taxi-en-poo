<?php
class Database {
    protected $servername;
    protected $username;
    protected $password;
    protected $nomdb;
    public $database; 

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "Papaf@ll21";
        $this->nomdb = "taxi";
        try {
            $database = new PDO("mysql:host=$this->servername;dbname=$this->nomdb", $this->username, $this->password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->database = $database;
        } catch (PDOException $e) {
            echo "Échec : " . $e->getMessage();
        }
    }

}

$connect = new Database(); 
$database = $connect->database;
?>