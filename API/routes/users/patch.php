<?php
require_once __DIR__ . "/../../libraries/parameters.php";
file_get_contents("php://input");
http_response_code(200);
header("Content-Type: application/json");
$body = json_decode(file_get_contents("php://input"), true);
$email = $body["email"];
$password = $body["password"];

$params = getParametersForRoute("/developpement_web_API/API/users/:user");
$user = $params["user"];

echo json_encode([
    "message" => "User $user updated successfully with email = $email and password = $password"
]);