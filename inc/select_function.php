<?php

include_once ('db_connection.php');

function select_genre()
{
    try {
        $dbh = db_connect('test', "Haribo39.");

        $sql = "SELECT id, name FROM genre ORDER BY name ASC;";
        $request = $dbh->query($sql);
        $return = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($return as $genre) {
            $id_genre = $genre['id'];
            $genre_name = ucfirst($genre['name']);
            echo("<option value='$id_genre'>$genre_name</option>");
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
        $dbh = null;
    }
}

function select_membership()
{
    try {
        $dbh = db_connect("test", "Haribo39.");

        $sql = "SELECT subscription.id, subscription.name FROM subscription
                ORDER BY subscription.id DESC;";

        $request = $dbh->query($sql);
        $subscriptions = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($subscriptions as $subscription) {
            $id_subscription = $subscription['id'];
            $name_subscription = $subscription['name'];
            echo("<option value='$id_subscription'>$name_subscription</option>");
        }
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
        $dbh = null;
    }
}