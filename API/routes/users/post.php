<?php
require_once __DIR__ . "/../../entities/users/add-users.php";
http_response_code(201);
header("Content-Type: application/json");
$body = json_decode(file_get_contents("php://input"), true);
$email = $body["email"];
$password = $body["password"];

try {
    addUsers($email, $password);

    echo json_encode([
        "success" => true,
        "message" => "User $email added successfully"
    ]);
} catch (PDOException $exception) {
    echo json_encode([
        "success" => false,
        "message" => "Error while adding user $email: " . $exception->getMessage()
    ]);
}