<?php

require_once __DIR__ . '/database.php';

class Song extends Database{
    
    private $id; 
    private $title; 
    private $artist_id;
    private $genre_id;
    private $price; 
    
    public function __construct($title, $artist_id, $genre_id, $price){
        parent::__construct();
        $this->title = $title;
        $this->artist_id = $artist_id;
        $this->genre_id = $genre_id;
        $this->price = $price; 
    }
    
    public function setTitle($title){
        $this->title = $title; 
    }
    
    public function setArtistId($artist){
        $this->artist_id = $artist; 
    }
    
    public function setGenreId($genre_id){
        $this->genre_id = $genre_id;
    }
    
    public function setPrice($price){
        $this->price = $price;
    }
    
    public function save(){
        $sql="
            INSERT INTO songs (title, artist_id, genre_id, price, added)
            VALUES(?, ?, ?, ?, CURRENT_TIMESTAMP) 
        ";
        
        $statement = static::$pdo->prepare($sql); 
        $statement->bindParam(1, $this->title);
        $statement->bindParam(2, $this->artist_id);
        $statement->bindParam(3, $this->genre_id);
        $statement->bindParam(4, $this->price);
        $statement->execute(); 
        
        $this->id = static::$pdo->lastInsertId(); 
        
    }
    
    public function getTitle(){
        return $this->title; 
    }
    
    public function getId(){
        return $this->id; 
    }
    

}

?>
