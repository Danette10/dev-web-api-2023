<?php
require_once __DIR__ . "/../../database/connection.php";

function loginUser(array $body): string{

    $db = getDatabaseConnection();

    $getUserQuery = $db->prepare("SELECT * FROM users WHERE email = :email");
    $getUserQuery->execute([
        "email" => $body["email"]
    ]);
    $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

    if(!$user) {
        throw new Exception("Credentials are invalid");
    }

    $isValidPassword = password_verify($body["password"], $user["password"]);

    if(!$isValidPassword) {
        throw new Exception("Credentials are invalid");
    }

    $token = bin2hex(random_bytes(16));

    $updateTokenQuery = $db->prepare("UPDATE users SET token = :token WHERE id = :id");
    $success = $updateTokenQuery->execute([
        "token" => $token,
        "id" => $user["id"]
    ]);

    if(!$success) {
        throw new Exception("Failed to create the token in the database");
    }

    return $token;

}