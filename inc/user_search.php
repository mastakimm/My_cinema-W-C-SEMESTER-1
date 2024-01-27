<?php
include_once 'db_connection.php';
session_start();

$dbh = db_connect("test", "Haribo39.");

//              Get input             //

$input_user_firstname = isset($_POST['input_user_firstname']) ? $_POST['input_user_firstname'] :
    (isset($_SESSION['input_user_firstname']) ? $_SESSION['input_user_firstname'] : "");
$_SESSION['input_user_firstname'] = $input_user_firstname;

$input_user_lastname = isset($_POST['input_user_lastname']) ? $_POST['input_user_lastname'] :
    (isset($_SESSION['input_user_lastname']) ? $_SESSION['input_user_lastname'] : "");
$_SESSION['input_user_lastname'] = $input_user_lastname;

$filter = "";

//          Update the filter depending on the inputs            //

if (!empty($input_user_lastname)) {
    $filter .= "WHERE user.lastname LIKE '%$input_user_lastname%'";
}

if (!empty($input_user_firstname)) {
    if (empty($input_user_firstname)) {
        $filter .= " AND ";
    } else {
        $filter .= "WHERE ";
    }
    $filter .= "user.firstname LIKE '%$input_user_firstname%'";
}

//          Search for users depending on the filters          //
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

//          Count total results         //

$sql = "SELECT COUNT(*) as 'total_results' FROM user
        $filter;";

$stmt = $dbh->query($sql);
$stmt->execute();
$results = $stmt->fetch();

$total_results = $results['total_results'];
$result_per_page = 15;
$first_results = ($currentPage * $result_per_page) - $result_per_page;

$pages = ceil($total_results / $result_per_page);

try {
    $sql = "SELECT user.lastname , user.firstname, user.id FROM user
            $filter                                
            ORDER BY user.lastname
            LIMIT :first_results, :result_per_page;";

    $request = $dbh->prepare($sql);
    $request->bindValue(':first_results', $first_results, PDO::PARAM_INT);
    $request->bindValue(':result_per_page', $result_per_page, PDO::PARAM_INT);
    $request->execute();

    $users = $request->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
    $dbh = null;
}
