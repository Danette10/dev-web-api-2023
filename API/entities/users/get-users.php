<?php

function getUsers(){
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $getUsersQuery = $databaseConnection->prepare(
        "
        SELECT * FROM users
        "
    );

    $getUsersQuery->execute();

    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}