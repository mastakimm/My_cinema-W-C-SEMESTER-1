<?php
include_once 'db_connection.php';
$id = $_GET['id'];

//          Get * datas from movies         //

try {
    $dbh = db_connect("test", "Haribo39.");

    $sql = "SELECT *, distributor.name FROM movie
    JOIN distributor ON distributor.id = movie.id_distributor
    WHERE movie.id = $id;";

    $request = $dbh->query($sql);
    $movies = $request->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $dbh = null;
}

//          Assign * datas from movies          //

$id_movie = $movies['id'];
$title_movie = $movies['title'];
$name_distributor = $movies['name'];
$movie_director = $movies['director'];
$movie_duration = $movies['duration'];
$movie_release_date = date('Y/m/d', strtotime($movies['release_date']));
