<?php
function patchUsers($email, $password, $id){
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $updateUserQuery = $databaseConnection->prepare(
        "
        UPDATE users SET email = :email, password = :password WHERE id = :id
        "
    );

    $updateUserQuery->execute([
        "email" => $email,
        "password" => $password,
        "id" => $id
    ]);

    return $updateUserQuery->fetchAll(PDO::FETCH_ASSOC);
}