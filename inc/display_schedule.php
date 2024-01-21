<?php
include_once 'db_connection.php';
$dbh = db_connect("test", "Haribo39.");

function display_schedule()
{
    try {
        $dbh = db_connect("test", "Haribo39.");

        $sql = "SELECT * FROM movie_schedule ms
                JOIN movie m ON m.id = ms.id_movie
                JOIN room r ON r.id = ms.id_room;";
        $request = $dbh->query($sql);
        $schedule = $request->fetchall(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }


    foreach ($schedule as $movie) {
        /*
         * Add href to card of each movie*
         */
        echo "<tr><td style='color: lightseagreen'>" . "Title : " . $movie['title'] . " Room Number : " . $movie['number'] . " Date_begin : " . $movie['date_begin'] . "</td></tr>";
    }

}

// return var_dump($schedule);
