<?php

class Database{
    private $host = 'itp460.usc.edu';
    private $dbname = 'music'; 
    private $user = 'student';
    private $password = 'ttrojan'; 
    
    //static connectionto be used across all classes
    protected static $pdo; 
    
    //sets up the database connection
    public function __construct(){
        //checks if there is already a static pdo property, ensures only one connection is created
        if(!static::$pdo){
            $connectionString = "mysql:host=" . $this->host . ";dbname=" . $this->dbname; 
            static::$pdo = new PDO($connectionString, $this->user, $this->password); 
        }
    }
}
?>