<?php
include_once 'db_connection.php';

$dbh = db_connect("test", "Haribo39.");

//              Get input             //

$input_user_firstname = $_POST['input_user_firstname'];
$input_user_lastname = $_POST['input_user_lastname'];

$filter = "";

//          Update the filter depending on the inputs            //

if ($_POST['input_user_lastname'] !== '#') {
    $filter .= "WHERE user.lastname LIKE '%$input_user_lastname%'";
}

if (!empty($_POST['input_user_firstname'])) {
    $filter .= "AND user.firstname LIKE '%$input_user_firstname%'";
}

//          Search for users depending on the filters          //

try {
    $sql = "SELECT user.lastname , user.firstname, user.id FROM user
            $filter                                
            ORDER BY user.lastname;";

    $request = $dbh->query($sql);
    $users = $request->fetchALL(PDO::FETCH_ASSOC);

    if (isset($users)) {
        $result_count = count($users);
    } else {
        $result_count = "No result found.";
    }
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $dbh = null;
}
