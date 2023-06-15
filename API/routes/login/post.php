<?php
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../entities/login/login-user.php";



try{
    $body = getBody();
    $token = loginUser($body);
    echo jsonResponse(200, [], [
        "success" => true,
        "token" => $token
    ]);
}catch(Exception $ex) {
    echo jsonResponse(500, [], [
        "success" => false,
        "message" => $ex->getMessage()
    ]);
}