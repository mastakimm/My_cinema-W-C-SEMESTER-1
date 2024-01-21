<?php
include_once 'db_connection.php';

$dbh = db_connect('test', 'Haribo39.');
$id = $_GET['id'];

//          Get * datas from user           //
try {
    $sql = "SELECT * FROM user WHERE user.id = $id;";
    $request = $dbh->query($sql);
    $member = $request->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}

//          Get membership status info          //

try {
    $sql = "SELECT membership.id, id_user, id_subscription, date_begin, subscription.name FROM membership
            JOIN user ON user.id = membership.id_user
            JOIN subscription ON subscription.id = membership.id_subscription
            WHERE user.id = $id;";

    $request = $dbh->query($sql);
    $membership = $request->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}

//          Assign datas from both user and membership status           //

$firstname = $member['firstname'];
$lastname = $member['lastname'];
$birthdate = date('Y/m/d', strtotime($member['birthdate']));
$email = $member['email'];
$zipcode = $member['zipcode'];
$city = $member['city'];
$country = $member['country'];
$select_subscription = $_POST['select_subscription'];
$date_begin = date('Y/m/d', strtotime($membership['date_begin']));

if (empty($membership['name'])) {
    $membership['name'] = "N/A";
}

$dbh = null;
