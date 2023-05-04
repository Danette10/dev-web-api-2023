<?php
function addUsers($email, $password){
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $insertUserQuery = $databaseConnection->prepare(
        "
        INSERT INTO users (email, password) VALUES (:email, :password)
        "
    );

    $insertUserQuery->execute([
        "email" => $email,
        "password" => $password
    ]);

    return $insertUserQuery->fetchAll(PDO::FETCH_ASSOC);
}