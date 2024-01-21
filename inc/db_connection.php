<?php

function db_connect ($user, $pass)
{
    try {
        $dsn ='mysql:host=localhost;port=3306;dbname=cinema';
        return new PDO($dsn, $user, $pass);

    } catch (Exception $e) {
        die('Contacter votre administateur.');
    }
}
