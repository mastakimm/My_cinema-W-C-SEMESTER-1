<?php
include_once 'db_connection.php';

$dbh = db_connect("test", "Haribo39.");

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

$sql = "SELECT COUNT(*) AS 'total_results' FROM movie_schedule;";

$stmt = $dbh->query($sql);
$stmt->execute();
$results = $stmt->fetch();

$total_results = $results['total_results'];
$result_per_page = 15;
$first_results = ($currentPage * $result_per_page) - $result_per_page;

$pages = ceil($total_results / $result_per_page);

if ($currentPage >=  $pages) {
    $currentPage = $pages;
}


$date = isset($_POST['schedule_date_picker']) ? $_POST['schedule_date_picker'] : "";

try {
    $dbh = db_connect("test", "Haribo39.");

            //      to fix          //

    $filter = "";

    if (!empty($_POST['schedule_date_picker'])) {
            $filter .= "WHERE DATE(date_begin) = '$date'";
    }

    $sql = "SELECT * FROM movie_schedule ms
            JOIN movie m ON m.id = ms.id_movie
            JOIN room r ON r.id = ms.id_room
            $filter
            ORDER BY date_begin DESC 
            LIMIT :first_results, :result_per_page;";

    $request = $dbh->prepare($sql);
    $request->bindValue(':first_results', $first_results, PDO::PARAM_INT);
    $request->bindValue(':result_per_page', $result_per_page, PDO::PARAM_INT);
    $request->execute();

    $schedule = $request->fetchall(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $dbh = null;
}
