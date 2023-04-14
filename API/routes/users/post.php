<?php
http_response_code(201);
header("Content-Type: application/json");
$body = json_decode(file_get_contents("php://input"), true);
$email = $body["email"];
$password = $body["password"];
echo json_encode([
    "email" => $email,
    "password" => $password
]);