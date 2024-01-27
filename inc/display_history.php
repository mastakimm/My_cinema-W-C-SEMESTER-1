<?php
require_once 'db_connection.php';
require_once 'display_user.php';

$id = $_GET['id'];
$dbh = db_connect('test', 'Haribo39.');

//          Get history from user ID            //


//Enlever la déclaration de la fonction pour corriger l'erreur de norme.
function show_history()
{
    $id = $_GET['id'];

    try {
        $dbh = db_connect('test', 'Haribo39.');

        $sql = "SELECT movie_title, viewing_date
        FROM history
        WHERE history.user_id = $id
        ORDER BY viewing_date;";

        $request = $dbh->query($sql);
        $history = $request->fetchALL(PDO::FETCH_ASSOC);

        $request->closeCursor();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $dbh = null;
    }

    foreach ($history as $movie) {
        //set href on title so it's link to the movie card.
        echo "<span>" . $movie['movie_title'] . "</span><span>" . $movie['viewing_date'] . "</span>";
    }
}

//          Add a movie to the personal hisotry of the user         //

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
    $movie_title = $_POST['movie_title'];
    $viewing_date = $_POST['date'];

    try {
        $sql = "INSERT INTO history(user_id, movie_title, viewing_date)
        VALUES (:user_id, :movie_title, :viewing_date);";

        $stmt = $dbh->prepare($sql);

        $stmt->execute([
            'user_id' => $id,
            'movie_title' => $movie_title,
            'viewing_date' => $viewing_date
        ]);

        header('Location: ' . $_SERVER['PHP_SELF'] . '?id=' . $id);
        exit;
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}

$dbh = null;
