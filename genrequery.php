<?php

namespace Itp\Music;

require_once __DIR__ . '/database.php';

use \Itp\Base\Database; 
use \PDO;

class GenreQuery extends Database{
    public function __construct(){
        parent::__construct();
    }
    
    public function getAll(){
        $sql = "
            SELECT *
            FROM genres
            ORDER BY genre;
        ";
        
    $statement = static::$pdo->prepare($sql);
    $statement->execute();
    $genre = $statement->fetchAll(PDO::FETCH_OBJ); 
    
    return $genre;

    }
}

?>
