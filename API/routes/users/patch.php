<?php
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/users/patch-users.php";
file_get_contents("php://input");
http_response_code(200);
header("Content-Type: application/json");
$body = json_decode(file_get_contents("php://input"), true);
$email = $body["email"];
$password = $body["password"];

$params = getParametersForRoute("/dev-web-api-2023/API/users/:user");
$user = $params["user"];

try {
    patchUsers($email, $password, $user);

    echo json_encode([
        "success" => true,
        "message" => "User $user updated successfully with email = $email and password = $password"
    ]);
} catch (PDOException $exception) {
    echo json_encode([
        "success" => false,
        "message" => "Error while updating user $user: " . $exception->getMessage()
    ]);
}