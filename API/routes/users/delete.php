<?php
require_once __DIR__ . "/../../libraries/parameters.php";

http_response_code(200);
header("Content-Type: application/json");

$params = getParametersForRoute("/developpement_web_API/API/users/:user");
$user = $params["user"];

echo json_encode([
    "message" => "User $user deleted successfully"
]);