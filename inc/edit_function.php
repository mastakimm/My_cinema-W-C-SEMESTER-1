<?php
include_once 'db_connection.php';
include_once 'display_movie.php';
include_once 'display_user.php';
$dbh = db_connect("test", "Haribo39.");

//DELETE ON CASCADE IN MEMBERSHIP LOG - DONE

if (isset($_POST['select_subscription'])) {
    if ($_POST['select_subscription'] === "null") {
        try {
            $sql = "DELETE FROM membership
                    WHERE id_user = :id_user;";

            $stmt = $dbh->prepare($sql);
            if ($stmt->execute([
                'id_user' => $_GET['id']
            ]))
            {
                echo $firstname . " " . $lastname . " successfuly deleted from membership.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

//          Update membership subscription status           //

    if ($_POST['select_subscription'] != "null") {
        try {
            $sql = "UPDATE membership
                    SET id_subscription = :id_subscription
                    WHERE id_user = :id_user;";

            $stmt = $dbh->prepare($sql);

            if ($stmt->execute([
                ':id_user' => $_GET['id'],
                ':id_subscription' => $_POST['select_subscription']
            ])) {
                echo $firstname . " " . $lastname . " subscription status successfully updated. Subscription status = " . $membership["name"];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

//          Add new member to membership            //

    if ($_POST['select_subscription'] != "null" && $membership['name'] === "N/A") {
        try {
            $newMembership = "INSERT INTO membership (id_user, id_subscription, date_begin)
                              VALUES (:id_user, :id_subscription, :date_begin);";

            $stmt = $dbh->prepare($newMembership);
            if ($success = $stmt->execute([
                ':id_user' => $_GET['id'],
                ':id_subscription' => $_POST['select_subscription'],
                'date_begin' => date("Y-m-d H:i:s")
            ])) {
                echo $firstname . " " . $lastname . " Successfully added to membership. Subscription status = " . $membership["name"];
            }

            /*if ($success) {
                try {
                    $sql = "UPDATE membership
                SET id_subscription = :id_subscription
                WHERE id_user = :id_user;";

                    $stmt = $dbh->prepare($sql);
                    $stmt->execute([
                        'id_subscription' => $_POST['select_subscription'],
                        'id_user' => $_GET['id']
                    ]);
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    $dbh = null;
                }
            }*/

        }  catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$dbh = null;
