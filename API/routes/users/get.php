<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/users/get-users.php";
require_once __DIR__ . "/../../entities/authentication/is-authenticated-user.php";

try {
    $users = getUsers();

    $headers = getallheaders();

    $authorization = $headers["Authorization"];

    [$authorizationType, $authorizationToken] = explode(" ", $authorization);

    if($authorizationType !== "Bearer") {
        throw new Exception("Invalid authorization type");
    }

    if(!$authorizationToken) {
        throw new Exception("Invalid authorization token");
    }

    if(!isAuthenticatedUser($authorizationToken)) {
        throw new Exception("Invalid authorization token");
    }

    echo jsonResponse(200, [], [
        "success" => true,
        "users" => $users
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "message" => "Error while getting users: " . $exception->getMessage()
    ]);
}