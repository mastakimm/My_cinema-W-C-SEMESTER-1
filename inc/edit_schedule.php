<?php
include_once 'db_connection.php';

$formattedDateTime = str_replace('T', ' ', $_POST['date_picker']);
$formattedDateTime .= ":00";

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['date_picker'])
    && $_POST['select_room_number'] != "default") {
    $formattedDateTime = str_replace('T', ' ', $_POST['date_picker']);
    try {
        $dbh = db_connect('test', 'Haribo39.');

        $sql = "INSERT INTO movie_schedule (id_movie, id_room, date_begin)
                VALUES (:id_movie, :id_room, :date_begin);";

        $request = $dbh->prepare($sql);
        $request->execute([
            ':id_movie' => $_GET['id'],
            ':id_room' => $_POST['select_room_number'],
            ':date_begin' => $formattedDateTime
        ]);

        header('Location: ' . $_SERVER['PHP_SELF'] . "?id=" . $_GET['id']);
        exit;
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
        $dbh = null;
    }
}
