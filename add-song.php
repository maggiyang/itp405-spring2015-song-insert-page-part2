<?php 

require_once __DIR__ . '/vendor/autoload.php';

use \Itp\Music\User; 
use \Itp\Music\ArtistQuery;
use \Itp\Music\GenreQuery; 
use \Itp\Music\Song;
use \Symfony\Component\HttpFoundation\Session\Session;


$session = new Session();
$session->start(); 


$aq = new ArtistQuery(); 
$gq = new GenreQuery(); 

if(isset($_POST['savebutton'])){
    $title = $_POST['title'];
    $artist_id = $_POST['artist'];
    $genre_id = $_POST['genre'];
    $price = $_POST['price'];
    $song = new Song($title, $artist_id, $genre_id, $price);
    $song->save();  
	
	$session->getFlashBag()->add('insert-success', '<p> The song ' . $song->getTitle() . ' with an ID of ' . $song->getId() . ' was inserted successfully!</p>'); 
	
	header('Location: add-song.php'); 
	exit;
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Song Insert</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    
    <body>
		<?php foreach($session->getFlashBag()->get('insert-success') as $message) : ?>
		<p>
			<?php echo $message ?>
		</p>
		<?php endforeach ?>
		
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
        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>
