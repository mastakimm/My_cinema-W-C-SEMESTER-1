<?php
include_once 'db_connection.php';

$dbh = db_connect("test", "Haribo39.");

//          Input of the user           //

$input_movie = $_POST['input-movie'];
$select_genre = $_POST['select_genre'];
$input_distributor = $_POST['input_distributor'];

$filter = "";

//          Update the filter depending on the inputs            //

if (!empty($_POST['input-movie'])) {
    $filter .= "WHERE movie.title LIKE '%$input_movie%'";
}

if ($_POST['select_genre'] !== '#') {
    $filter .= "AND genre.id LIKE '$select_genre'";
}

if (!empty($_POST['input_distributor'])) {
    $filter .= "AND distributor.name LIKE '%$input_distributor%'";
}

//          Search for movies depending on the filters          //

try {
    $sql = "SELECT movie.id, movie.title FROM movie
            JOIN movie_genre ON movie.id = movie_genre.id_movie
            JOIN genre ON genre.id = movie_genre.id_genre
            JOIN distributor ON distributor.id = movie.id_distributor
            $filter                    
            ORDER BY movie.title;";

    $request = $dbh->query($sql);
    $movies = $request->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $dbh = null;
}

if (isset($movies)){
    $movies_count = count($movies);
} else {
    $movies_count = "No result found";
}