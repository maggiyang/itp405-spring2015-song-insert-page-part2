<?php

namespace Itp\Music;

require_once __DIR__ . '/database.php';

use \Itp\Base\Database;
use \PDO;

class ArtistQuery extends Database{
    public function __construct(){
        parent::__construct();
    }
    
    public function getAll(){
        $sql = "
            SELECT *
            FROM artists
            ORDER BY artist_name;
        ";
        
        $statement = static::$pdo->prepare($sql);
        $statement->execute();
        $artist = $statement->fetchAll(PDO::FETCH_OBJ);
		
        return $artist;
        
    }
    
    
}

?>