<?php
function deleteUsers($user){
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $deleteUserQuery = $databaseConnection->prepare(
        "
        DELETE FROM users WHERE id = :id
        "
    );

    $deleteUserQuery->execute([
        "id" => $user
    ]);

    return $deleteUserQuery->fetchAll(PDO::FETCH_ASSOC);
}