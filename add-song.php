<?php 
require_once __DIR__ . '/artistquery.php'; 
require_once __DIR__ . '/genrequery.php'; 
require_once __DIR__ . '/song.php';

$aq = new ArtistQuery(); 
$gq = new GenreQuery(); 

if(isset($_POST['savebutton'])){
    $title = $_POST['title'];
    $artist_id = $_POST['artist'];
    $genre_id = $_POST['genre'];
    $price = $_POST['price'];
    $song = new Song($title, $artist_id, $genre_id, $price);
    $song->save();      
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Song Insert</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    
    <body></body>
        <?php if(isset($_POST['savebutton'])){ ?>
            <p>The song <?php echo $song->getTitle() ?>
            with an ID of <?php echo $song->getId() ?>
            was inserted successfully!</p>
            <a href="add-song.php">Return to Add Songs</a>
        <?php }else{ ?>
        <form method="post" name="songinput">
            Title: <input type="text" name="title">
            Artists: 
                <select name="artist">
                    <?php foreach($aq->getAll() as $artistQuery){ ?>
                    <option value="<?php echo $artistQuery->id ?>"><?php echo $artistQuery->artist_name ?></option>
                <?php } ?>
                </select>
            Genre: 
                <select name="genre">
                    <?php foreach($gq->getAll() as $genreQuery){ ?>
                    <option value="<?php echo $genreQuery->id ?>"><?php echo $genreQuery->genre ?></option>
                    <?php } ?>
                </select>
            Price: <input type="text" name="price">
            <input type="submit" value="save" name="savebutton">
        </form>
        <?php } ?>
        
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>
