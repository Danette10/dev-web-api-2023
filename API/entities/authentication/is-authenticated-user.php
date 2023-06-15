<?php
require_once __DIR__ . "/../../database/connection.php";

function isAuthenticatedUser(string $token): bool{
    $db = getDatabaseConnection();

    $getUserQuery = $db->prepare("SELECT * FROM users WHERE token = :token");
    $getUserQuery->execute([
        "token" => $token
    ]);
    $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

    return !!$user;
}