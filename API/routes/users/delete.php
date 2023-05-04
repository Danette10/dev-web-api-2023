<?php
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/users/delete-users.php";

http_response_code(200);
header("Content-Type: application/json");

$params = getParametersForRoute("/dev-web-api-2023/API/users/:user");
$user = $params["user"];

try{
    deleteUsers($user);

    echo json_encode([
        "success" => true,
        "message" => "User $user deleted successfully"
    ]);
} catch (PDOException $exception) {
    echo json_encode([
        "success" => false,
        "message" => "Error while deleting user $user: " . $exception->getMessage()
    ]);
}