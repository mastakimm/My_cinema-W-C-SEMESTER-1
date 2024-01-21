<?php
include_once 'db_connection.php';
include_once 'display_user.php';

$dbh = db_connect('test', 'Haribo39.');
$id = $_GET['id'];

$movie_title = $_POST['movie_title'];
$viewing_date = $_POST['date'];

//          Get history from user ID            //

try {
    $sql = "SELECT movie_title, date 
        FROM history
        WHERE history.user_id = $id;
        ORDER BY date;";

    $request = $dbh->query($sql);
    $history = $request->fetchALL(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//          Add a movie to the personal hisotry of the user         //

if (isset($_POST['date']) && isset($_POST['movie_title'])) {
    try {
        $sql = "INSERT INTO history(user_id, movie_title, date)
        VALUES (:user_id, :movie_title, :date);";

        $stmt = $dbh->prepare($sql);

        $stmt->execute([
            'user_id' => $id,
            'movie_title' => $movie_title,
            'date' => $viewing_date
        ]);
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
}

$dbh = null;


/*if (!isset($_POST['date'])) {
    echo "Please enter a date.";
}

if (!isset($_POST['movie_title'])) {
    echo "Please enter a movie title.";
}*/
